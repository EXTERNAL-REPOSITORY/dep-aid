<?php

namespace App\Repositories;

// use App\Models\Inventory;
use App\Models\PatientForm;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\DB;
use PDF;

class DeseaseForecastRepository
{
    public function getTopTenIllnesses($request)
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
        
        $data = PatientForm::select(DB::raw('
            main_reason_for_consultation AS diagnosis, 
            COUNT(main_reason_for_consultation) AS consultation,
            created_at
        '))
        ->where('main_reason_for_consultation','<>','')
        ->whereRaw('MONTH(created_at) = '.$request->month)
        ->groupByRaw('main_reason_for_consultation, MONTH(created_at)')
        ->orderByRaw('consultation DESC , MONTH(created_at) ASC')
        ->take(10)
        ->get();
        // dd($data);
        return $data;    
    }
}