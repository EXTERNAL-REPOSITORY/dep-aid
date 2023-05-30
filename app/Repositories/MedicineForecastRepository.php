<?php

namespace App\Repositories;

// use App\Models\Inventory;
use App\Models\DispensedMedicines;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\DB;
use PDF;

class MedicineForecastRepository
{
    public function getTopTenMedicines($request)
    {
        //Add condition if one of the date filter is null
        // $requestData = [
        //     'search' => isset($request->search) ? $request->search : null
        // ];

        // $query = Inventory::query();

        // $result = app(Pipeline::class)
        //     ->send($query)
        //     ->through([
        //         \App\Pipelines\Search\SearchInventoryTable::class,
        //         \App\Pipelines\Filter\DateFilter::class
        //     ])->thenReturn();

        // $data = $result ? $result : $query;
        // $antibiotic = $data->whereRaw('inventory.expiration_date >= NOW()')
        // ->where('type', 'Antibiotics')
        // ->paginate(10);

        // return compact('antibiotic', 'requestData');

        $data = DispensedMedicines::select(DB::raw('
            inventory.medicine_name, 
            COUNT(inventory.medicine_name) AS medicine_occurrence,
            dispensed_medicines.created_at
        '))->join('inventory', 'dispensed_medicines.medicine_id', '=', 'inventory.id')
            ->where('inventory.medicine_name', '<>', '')
            ->whereRaw('MONTH(dispensed_medicines.created_at) = ' . $request->month)
            ->groupByRaw('medicine_name, MONTH(dispensed_medicines.created_at)')
            ->orderByRaw('medicine_occurrence DESC , MONTH(dispensed_medicines.created_at) ASC')
            ->take(10)
            ->get();
        // dd($data);
        return $data;
    }
}
