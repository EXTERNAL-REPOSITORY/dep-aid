<?php

namespace App\Repositories;

use App\Models\Inventory;
use Illuminate\Pipeline\Pipeline;
use PDF;

class EarMedsRepository
{
    public function getAllEarMeds($request)
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
        $earMeds = $data->where('type', 'Ear Meds')->paginate(10);

        return compact('earMeds', 'requestData');
    }

    public function storeEarMeds($request)
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

    public function updateEarMeds($request, $earMedsId)
    {
        $query = Inventory::where('id', $earMedsId)->update([
            'medicine_name' => $request->medicine_name,
            'brand' => $request->brand,
            'quantity' => $request->quantity,
            'manufacturer_date' => $request->manufacturer_date,
            'expiration_date' => $request->expiration_date,
            'type' => $request->type,
        ]);

        return $query;
    }

    public function deleteEarMeds($earMedsId)
    {
        return Inventory::find($earMedsId->id)->delete();
    }

    public function generatePdf()
    {
        $query = Inventory::where('type', 'Ear Meds')->get();

        $data = [
            'title' => 'DEP-AID Inventory - Ear Meds Report',
            'users' => $query
        ];

        $pdf = PDF::loadView('pdf.inventory', $data);

        return $pdf->download('DEP-AID Inventory - Ear Meds Report.pdf');
    }
}
