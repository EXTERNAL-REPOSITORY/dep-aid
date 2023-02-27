<?php

namespace App\Repositories;

use App\Models\Inventory;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\DB;
use PDF;
class NearExpiryMedsRepository
{
    public function getAllNearExpiryMeds($request)
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
        
        $nearExpiryMeds = $data->select(DB::raw('
        inventory.id,
        inventory.brand,
        inventory.medicine_name,
        inventory.stock_balance,
        inventory.manufacturer_date,
        DATE_SUB( inventory.expiration_date, INTERVAL 30 DAY ) AS DE,
        DATEDIFF(inventory.expiration_date, NOW()) AS days_left,
        inventory.expiration_date'))
        ->whereRaw('NOW() BETWEEN DATE_SUB( inventory.expiration_date, INTERVAL 30 DAY ) AND inventory.expiration_date')->paginate(10);
        return compact('nearExpiryMeds', 'requestData');
    }

    public function generatePdf()
    {
        $query = Inventory::whereRaw('NOW() BETWEEN DATE_SUB( inventory.expiration_date, INTERVAL 30 DAY ) AND inventory.expiration_date')->get();

        $data = [
            'title' => 'DEP-AID Inventory - NearExpiryMeds Report',
            'users' => $query
        ];

        $pdf = PDF::loadView('pdf.inventory', $data);

        return $pdf->download('DEP-AID Inventory - NearExpiryMeds Report.pdf');
    }
}
