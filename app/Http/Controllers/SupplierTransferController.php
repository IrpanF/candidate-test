<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Models\Layup;
use App\Models\Layer;
use Illuminate\Http\Request;

class SupplierTransferController extends Controller
{
    public function export(Supplier $supplier)
    {
        $supplier->load('layups.layers');

        return response()->json($supplier);
    }
}