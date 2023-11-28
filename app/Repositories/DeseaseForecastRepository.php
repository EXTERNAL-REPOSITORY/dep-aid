<?php

namespace App\Repositories;

// use App\Models\Inventory;
use App\Models\PatientForm;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\DB;
use PDF;

class DeseaseForecastRepository
{
    public function getTopTenIllnessesOld($request)
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
            diagnosis, 
            COUNT(diagnosis) AS consultation,
            created_at
        '))
            ->where('diagnosis', '<>', '')
            ->whereRaw('MONTH(created_at) = ' . $request->month)
            ->groupByRaw('diagnosis, MONTH(created_at)')
            ->orderByRaw('consultation DESC , MONTH(created_at) ASC')
            ->take(10)
            ->get();
        // dd($data);
        return $data;
    }


    public function getTopTenIllnesses($request)
    {
        $data = PatientForm::select(DB::raw('
            patient_form.diagnosis,
            patient_form.created_at,
            COUNT( patient_form.diagnosis ) AS diagnosis_count
        '))
            // ->where('diagnosis', '<>', '')
            ->whereRaw('MONTH(created_at) = ' . $request->month)
            ->groupByRaw('MONTH ( created_at ),
                        YEAR ( created_at ),
                        patient_form.diagnosis')
            ->orderByRaw('patient_form.diagnosis ASC,
                        patient_form.created_at ASC')
            // ->take(10)
            ->get();
        // dd($data);
        return $data;
    }

    public function getIllnesses($request)
    {
        $data = PatientForm::select(DB::raw('
            MONTH( patient_form.created_at ) AS `month`,
            patient_form.temperature,
            COUNT( patient_form.diagnosis ) AS diagnosis_count,
            patient_form.diagnosis AS label
        '))
            ->whereRaw('MONTH(created_at)='.$request->month.' AND patient_form.diagnosis !="" OR patient_form.diagnosis !=NULL')
            ->groupByRaw('`month`,
                        temperature,
                        label ')
            ->orderByRaw('`month` ASC,
                        diagnosis_count ASC,
                        temperature ASC')
            // ->take(10)
            ->get();
        // dd($data);
        return $data;
    }
}
