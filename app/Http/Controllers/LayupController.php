<?php

namespace App\Http\Controllers;

use App\Models\Layup;
use App\Models\Supplier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LayupController extends Controller
{
    public function index()
    {
        $layups = Layup::with('supplier')->latest()->get();

        return view('layups.index', compact('layups'));
    }

    public function create()
    {
        $suppliers = Supplier::all();

        return view('layups.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required',
            'name' => 'required',
            'description' => 'nullable'
        ]);

        Layup::create($request->all());

        return redirect()->route('layups.index');
    }

    public function edit(Layup $layup)
    {
        $suppliers = Supplier::all();

        return view('layups.edit', compact('layup', 'suppliers'));
    }

    public function update(Request $request, Layup $layup)
    {
        $request->validate([
            'supplier_id' => 'required',
            'name' => 'required',
            'description' => 'nullable'
        ]);

        $layup->update($request->all());

        return redirect()->route('layups.index');
    }

    public function destroy(Layup $layup)
    {
        $layup->delete();

        return redirect()->route('layups.index');
    }
}