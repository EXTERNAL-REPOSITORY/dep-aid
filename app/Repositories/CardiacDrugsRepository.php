<?php

namespace App\Repositories;

use App\Models\Inventory;
use Illuminate\Pipeline\Pipeline;
use PDF;

class CardiacDrugsRepository
{
    public function getAllCardiacDrugs($request)
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
        $cardiacDrugs = $data->where('type', 'Cardiac Drugs')->paginate(10);

        return compact('cardiacDrugs', 'requestData');
    }

    public function storeCardiacDrugs($request)
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

    public function updateCardiacDrugs($request, $cardiacDrugsId)
    {
        $query = Inventory::where('id', $cardiacDrugsId)->update([
            'medicine_name' => $request->medicine_name,
            'brand' => $request->brand,
            'quantity' => $request->quantity,
            'manufacturer_date' => $request->manufacturer_date,
            'expiration_date' => $request->expiration_date,
            'type' => $request->type,
        ]);

        return $query;
    }

    public function deleteCardiacDrugs($cardiacDrugsId)
    {
        return Inventory::find($cardiacDrugsId->id)->delete();
    }

    public function generatePdf()
    {
        $query = Inventory::where('type', 'Cardiac Drugs')->get();

        $data = [
            'title' => 'DEP-AID Inventory - Anti-Inflammatory Report',
            'users' => $query
        ];

        $pdf = PDF::loadView('pdf.inventory', $data);

        return $pdf->download('DEP-AID Inventory - Anti-Inflammatory Report.pdf');
    }
}
