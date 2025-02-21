<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Outlet;

class ProductController extends Controller
{
    public function index()
{
    $products = Product::with('outlet')->paginate(10);
    return view('products.index', compact('products'));
}


    public function create()
    {
        $outlets = Outlet::all();
        return view('products.create', compact('outlets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'outlet_id' => 'required|exists:outlets,id'
        ]);
    
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'outlet_id' => $request->outlet_id
        ]);
    
        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    public function edit(Product $product)
    {
        $outlets = Outlet::all();
        return view('products.edit', compact('product', 'outlets'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'outlet_id' => 'required|exists:outlets,id'
        ]);
    
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'outlet_id' => $request->outlet_id
        ]);
    
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        // Check if the product has linked transactions
        if ($product->transactions()->exists()) {
            return redirect()->route('products.index')->with('error', 'Cannot delete product with existing transactions.');
        }

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
