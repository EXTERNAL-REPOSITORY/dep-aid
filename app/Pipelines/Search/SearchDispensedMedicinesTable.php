<?php

namespace App\Pipelines\Search;

use Illuminate\Database\Eloquent\Builder;
use Closure;

class SearchDispensedMedicinesTable
{
    public function handle(Builder $query, Closure $next)
    {
        if (request()->has('search')) {
            $query->where(function($query){
                $query->orWhere('dispensed_medicines.patient_name', 'LIKE', "%".request('search')."%")
                ->orWhere('inventory.medicine_name', 'LIKE', "%".request('search')."%")
                ->orWhere('inventory.brand', 'LIKE', "%".request('search')."%")
                ->orWhere('inventory.type', 'LIKE', "%".request('search')."%")
                ->orWhere('patient_form.name', 'LIKE', "%".request('search')."%")
                ->orWhere('patient_form.doctor_consulting', 'LIKE', "%".request('search')."%")
                ->orWhere('patient_form.main_reason_for_consultation', 'LIKE', "%".request('search')."%");
            });
        }
        $next($query);
    }
}