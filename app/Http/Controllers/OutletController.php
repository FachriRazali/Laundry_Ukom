<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;

class OutletController extends Controller
{
    public function index()
    {
        $outlets = Outlet::latest()->paginate(10);
        return view('outlets.index', compact('outlets'));
    }

    public function create()
    {
        return view('outlets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string'
        ]);

        Outlet::create($request->all());

        return redirect()->route('outlets.index')->with('success', 'Outlet added successfully.');
    }

    public function edit(Outlet $outlet)
    {
        return view('outlets.edit', compact('outlet'));
    }

    public function update(Request $request, Outlet $outlet)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string'
        ]);

        $outlet->update($request->all());

        return redirect()->route('outlets.index')->with('success', 'Outlet updated successfully.');
    }

    public function destroy(Outlet $outlet)
    {
        $outlet->delete();
        return redirect()->route('outlets.index')->with('success', 'Outlet deleted successfully.');
    }
}
