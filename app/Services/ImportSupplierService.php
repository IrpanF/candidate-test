<?php

namespace App\Services;

use App\Models\Supplier;
use App\Models\Layup;
use App\Models\Layer;

class ImportSupplierService
{
    public function handle($request)
    {
        $json = file_get_contents(
            $request->file('json_file')->getRealPath()
        );

        $data = json_decode($json, true);

        $supplier = Supplier::firstOrCreate([
            'name' => $data['name']
        ]);

        foreach ($data['layups'] as $layupData) {

            $layup = Layup::firstOrCreate([
                'supplier_id' => $supplier->id,
                'name' => $layupData['name']
            ], [
                'description' => $layupData['description'] ?? null
            ]);

            foreach ($layupData['layers'] as $layerData) {

                $existingLayer = Layer::where(
                    'layup_id',
                    $layup->id
                )->where(
                    'layer_order',
                    $layerData['layer_order']
                )->first();

                if ($existingLayer) {

                    $conflict =
                        $existingLayer->thickness != $layerData['thickness'] ||
                        $existingLayer->width != $layerData['width'] ||
                        $existingLayer->angle != $layerData['angle'];

                    if ($conflict) {

                        $existingLayer->update([
                            'thickness' => $layerData['thickness'],
                            'width' => $layerData['width'],
                            'angle' => $layerData['angle'],
                        ]);
                    }

                } else {

                    Layer::create([
                        'layup_id' => $layup->id,
                        'layer_order' => $layerData['layer_order'],
                        'thickness' => $layerData['thickness'],
                        'width' => $layerData['width'],
                        'angle' => $layerData['angle'],
                    ]);
                }
            }
        }
    }
}