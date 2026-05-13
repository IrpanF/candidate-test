<?php

namespace App\Http\Controllers;

use App\Models\Layup;
use App\Models\Supplier;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLayupRequest;
use App\Http\Requests\UpdateLayupRequest;
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

    public function store(StoreLayupRequest $request)
    {
        Layup::create($request->all());

        return redirect()->route('layups.index');
    }

    public function edit(Layup $layup)
    {
        $suppliers = Supplier::all();

        return view('layups.edit', compact('layup', 'suppliers'));
    }

    public function update(
    UpdateLayupRequest $request,
    Layup $layup
    )
    {
        $layup->update($request->all());

        return redirect()->route('layups.index');
    }

    public function destroy(Layup $layup)
    {
        $layup->delete();

        return redirect()->route('layups.index');
    }
}