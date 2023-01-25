<?php

namespace App\Repositories;

use App\Models\Inventory;
use Illuminate\Pipeline\Pipeline;
use PDF;

class AntiInflammatoryRepository
{
    public function getAllAntiInflammatory($request)
    {
        //Add condition if one of the date filter is null
        $requestData = [
            'search' => isset($request->search) ? $request->search : null
        ];

        $query = Inventory::query();

        $result = app(Pipeline::class)
            ->send($query)
            ->through([
                \App\Pipelines\Search\SearchInventoryTable::class,
                \App\Pipelines\Filter\DateFilter::class
            ])->thenReturn();
        
        $data = $result ? $result : $query;
        $antiInflammatory = $data->where('type', 'Anti-inflammatory')->paginate(10);

        return compact('antiInflammatory', 'requestData');
    }

    public function storeAntiInflammatory($request)
    {
        $query = Inventory::insertGetId([
            'medicine_name' => $request->medicine_name,
            'brand' => $request->brand,
            'quantity' => $request->quantity,
            'manufacturer_date' => $request->manufacturer_date,
            'expiration_date' => $request->expiration_date,
            'type' => $request->type,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        return $query;
    }

    public function updateAntiInflammatory($request, $antibioticId)
    {
        $query = Inventory::where('id', $antibioticId)->update([
            'medicine_name' => $request->medicine_name,
            'brand' => $request->brand,
            'quantity' => $request->quantity,
            'manufacturer_date' => $request->manufacturer_date,
            'expiration_date' => $request->expiration_date,
            'type' => $request->type,
        ]);

        return $query;
    }

    public function deleteAntiInflammatory($antiInflammatoryId)
    {
        return Inventory::find($antiInflammatoryId->id)->delete();
    }

    public function generatePdf()
    {
        $query = Inventory::where('type', 'Anti-inflammatory')->get();

        $data = [
            'title' => 'DEP-AID Inventory - Anti-Inflammatory Report',
            'users' => $query
        ];

        $pdf = PDF::loadView('pdf.inventory', $data);

        return $pdf->download('DEP-AID Inventory - Anti-Inflammatory Report.pdf');
    }
}
