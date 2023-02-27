<?php

namespace App\Repositories;

use App\Models\Inventory;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\DB;
use PDF;

class ReorderLvlMedsRepository
{
    public function getAllReorderLvlMeds($request)
    {
        $requestData = [
            'search' => isset($request->search) ? $request->search : null, 
        ];

        $query = Inventory::query();

        $result = app(Pipeline::class)
            ->send($query)
            ->through([
                \App\Pipelines\Search\SearchInventoryTable::class,
                \App\Pipelines\Filter\DateFilter::class
            ])->thenReturn();
        
        $data = $result ? $result : $query;
        $nearExpiryMeds = $data->whereRaw('inventory.expiration_date >= NOW() AND
        inventory.stock_balance <= (inventory.reorder_level/100*inventory.beginning_balance)')->paginate(10);


        return compact('nearExpiryMeds', 'requestData');
    }

    public function generatePdf()
    {
        $query = Inventory::where('type', 'NearExpiryMeds')->get();

        $data = [
            'title' => 'DEP-AID Inventory - NearExpiryMeds Report',
            'users' => $query
        ];

        $pdf = PDF::loadView('pdf.inventory', $data);

        return $pdf->download('DEP-AID Inventory - NearExpiryMeds Report.pdf');
    }
}
