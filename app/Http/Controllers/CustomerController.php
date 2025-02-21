<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    // 🚀 Ensure only Admin & Kasir can access this controller
    public function __construct()
    {
        $this->middleware('auth'); // ✅ Ensure authentication
        $this->middleware('role:admin,kasir'); // ✅ Allow only Admin & Kasir
    }

    // ✅ Display Transactions Based on Role
    public function index()
    {
        $transactions = Transaction::with('user', 'product')->latest()->paginate(10);

        if (auth()->user()->role == 'admin') {
            return view('transactions2.index', compact('transactions')); // Admin View
        } else {
            return view('transactions.index', compact('transactions')); // Kasir View
        }
    }

    // ✅ Show Create Transaction Form
    public function create()
    {
        $products = Product::all();
        return view('transactions.create', compact('products'));
    }

    // ✅ Store New Transaction
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);
        $total_price = $product->price * $request->quantity;

        Transaction::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_price' => $total_price,
            'status' => 'pending'
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction added successfully.');
    }

    // ✅ Show Edit Form for Transactions (Admins Only)
    public function edit(Transaction $transaction)
    {
        if (auth()->user()->role != 'admin') {
            return redirect()->route('transactions.index')->with('error', 'Unauthorized access.');
        }

        $products = Product::all();
        return view('transactions.edit', compact('transaction', 'products'));
    }

    // ✅ Update Transaction Status (Admins Only)
    public function update(Request $request, Transaction $transaction)
    {
        if (auth()->user()->role != 'admin') {
            return redirect()->route('transactions.index')->with('error', 'Unauthorized action.');
        }

        $request->validate([
            'status' => 'required|in:pending,completed,canceled'
        ]);

        $transaction->update(['status' => $request->status]);

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    // ✅ Delete Transaction (Admins Only)
    public function destroy(Transaction $transaction)
    {
        if (auth()->user()->role != 'admin') {
            return redirect()->route('transactions.index')->with('error', 'Unauthorized action.');
        }

        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}
