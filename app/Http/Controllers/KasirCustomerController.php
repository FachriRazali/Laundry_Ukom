<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class KasirCustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->paginate(10);
        return view('customers_kasir.index', compact('customers'));
    }

    public function create()
    {
        return view('customers_kasir.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'nullable|string|max:15',
        ]);

        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
        ]);

        return redirect()->route('kasir.customers.index')->with('success', 'Customer added successfully.');
    }

    public function edit(Customer $customer)
    {
        return view('customers_kasir.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'phone' => 'nullable|string|max:15',
        ]);

        $customer->update($request->only(['name', 'email', 'phone']));

        return redirect()->route('kasir.customers.index')->with('success', 'Customer updated successfully.');
    }

    // 🔥 **Fix: Add the Destroy Method**
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('kasir.customers.index')->with('success', 'Customer deleted successfully.');
    }
}
