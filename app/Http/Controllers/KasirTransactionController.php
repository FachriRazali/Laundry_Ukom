<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class KasirTransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('user_id', Auth::id())->with('product')->latest()->paginate(10);
        return view('transactions_kasir.index', compact('transactions'));
    }

    public function create()
    {
        $products = Product::all();
        return view('transactions_kasir.create', compact('products'));
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

        return redirect()->route('kasir.transactions.index')->with('success', 'Transaction added successfully.');
    }

    /**
     * 🛠 **Edit Transaction** - Allows kasir to update transaction status
     */
    public function edit(Transaction $transaction)
    {
        if ($transaction->user_id !== Auth::id()) {
            return redirect()->route('kasir.transactions.index')->with('error', 'Unauthorized Access.');
        }
    
        $products = Product::all(); // ✅ Fetch all products to pass to the view
        return view('transactions_kasir.edit', compact('transaction', 'products'));
    }
    

    /**
     * ✅ **Update Transaction**
     */
    public function update(Request $request, Transaction $transaction)
    {
        if ($transaction->user_id !== Auth::id()) {
            return redirect()->route('kasir.transactions.index')->with('error', 'Unauthorized Access.');
        }

        $request->validate([
            'status' => 'required|in:pending,completed,canceled'
        ]);

        $transaction->update(['status' => $request->status]);

        return redirect()->route('kasir.transactions.index')->with('success', 'Transaction updated successfully.');
    }
}
