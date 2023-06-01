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
        $cardiacDrugs = $data->whereRaw('inventory.expiration_date >= NOW()')
            ->where('type', 'Cardiac Drugs')->paginate(10);

        return compact('cardiacDrugs', 'requestData');
    }

    public function storeCardiacDrugs($request)
    {
        $query = Inventory::insertGetId([
            'medicine_name' => $request->medicine_name,
            'brand' => $request->brand,
            'beginning_balance' => $request->beginning_balance,
            'reorder_level' => $request->reorder_level,
            'stock_balance' => $request->stock_balance,
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
            'beginning_balance' => $request->beginning_balance,
            'reorder_level' => $request->reorder_level,
            'stock_balance' => $request->stock_balance,
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

        $r1 = $result ? $result : $query;
        $med = $r1->whereRaw('inventory.expiration_date >= NOW()')
            ->where('type', 'Cardiac Drugs')->get();

        $data = [
            'title' => 'DEP-AID Inventory - Cardiac Drug Report',
            'users' => $med
        ];
        $pdf = PDF::loadView('pdf.inventory', $data);

        return $pdf->download('DEP-AID Inventory - Cardiac Drug Report.pdf');
    }
}
