<?php

namespace App\Http\Controllers;

use App\Models\Layer;
use App\Models\Layup;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLayerRequest;
use App\Http\Requests\UpdateLayerRequest;
use Illuminate\Http\Request;

class LayerController extends Controller
{
    public function index()
    {
        $layers = Layer::with('layup')->latest()->get();

        return view('layers.index', compact('layers'));
    }

    public function create()
    {
        $layups = Layup::all();

        return view('layers.create', compact('layups'));
    }

    public function store(StoreLayerRequest $request)
    {
        Layer::create($request->all());

        return redirect()->route('layers.index');
    }

    public function edit(Layer $layer)
    {
        $layups = Layup::all();

        return view('layers.edit', compact('layer', 'layups'));
    }

    public function update(
    UpdateLayerRequest $request,
    Layer $layer
    )
    {
        $layer->update($request->all());

        return redirect()->route('layers.index');
    }

    public function destroy(Layer $layer)
    {
        $layer->delete();

        return redirect()->route('layers.index');
    }
}