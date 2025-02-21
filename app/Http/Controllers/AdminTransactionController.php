<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class AdminTransactionController extends Controller
{
    

    public function index()
    {
        $transactions = Transaction::with('user', 'product')->latest()->paginate(10);
        return view('transactions_admin.index', compact('transactions'));
    }

    public function create()
    {
        $products = Product::all();
        return view('transactions_admin.create', compact('products'));
    }

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

        return redirect()->route('admin.transactions.index')->with('success', 'Transaction added successfully.');
    }

    public function edit(Transaction $transaction)
    {
        $products = Product::all();
        return view('transactions_admin.edit', compact('transaction', 'products'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'status' => 'required|in:pending,completed,canceled'
        ]);

        $transaction->update(['status' => $request->status]);

        return redirect()->route('admin.transactions.index')->with('success', 'Transaction updated successfully.');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('admin.transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}
