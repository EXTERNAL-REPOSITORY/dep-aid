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
        $reorderLevelMeds = $data->whereRaw('inventory.expiration_date >= NOW() AND
        inventory.stock_balance <= (inventory.reorder_level/100*inventory.beginning_balance)')->paginate(10);


        return compact('reorderLevelMeds', 'requestData');
    }

    public function generatePdf()
    {
        $query = Inventory::whereRaw('inventory.expiration_date >= NOW() AND
        inventory.stock_balance <= (inventory.reorder_level/100*inventory.beginning_balance)')->get();

        $data = [
            'title' => 'DEP-AID Inventory - Reorder Level Medicines Report',
            'users' => $query
        ];

        $pdf = PDF::loadView('pdf.reorder-level-meds', $data)->setPaper('legal', 'landscape');

        return $pdf->download('DEP-AID Inventory - Reorder Level Medicines Report.pdf');
    }
}
