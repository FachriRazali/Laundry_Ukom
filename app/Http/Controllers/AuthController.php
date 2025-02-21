<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            // Redirect based on role
            $role = Auth::user()->role;
    
            if ($role === 'admin' || $role === 'kasir' || $role === 'owner') {
                return redirect()->route('dashboard');
            }
        }
    
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

      // 🚀 Show Registration Form
      public function showRegister()
      {
          return view('auth.register');
      }
  
      // 🚀 Handle User Registration
      public function register(Request $request)
      {
          $request->validate([
              'name' => 'required|string|max:255',
              'email' => 'required|string|email|max:255|unique:users',
              'password' => 'required|string|min:6|confirmed',
              'role' => 'required|in:admin,kasir,owner',
          ]);
  
          // 🔒 Encrypt Password
          User::create([
              'name' => $request->name,
              'email' => $request->email,
              'password' => Hash::make($request->password),
              'role' => $request->role,
          ]);
  
          return redirect()->route('login')->with('success', 'User registered successfully.');
      }
}
