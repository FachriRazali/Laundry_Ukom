<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerAuthController extends Controller
{
    // 🚀 Show Customer Registration Form
    public function showRegister()
    {
        return view('auth.customer_register');
    }

    // 🚀 Handle Customer Registration
    public function register(Request $request)
    {
        // Validate the request including the phone field
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|string|max:15',  // Add validation for phone
        ]);

        // Encrypt password and create a new customer with phone
        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,  // Add phone here
        ]);

        return redirect()->route('customer.login')->with('success', 'Customer registered successfully.');
    }

    // 🚀 Show Customer Login Form
    public function showLogin()
    {
        return view('auth.customer_login');
    }

    // 🚀 Handle Customer Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->route('customer.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // 🚀 Handle Customer Logout
    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('customer.login');
    }
}
