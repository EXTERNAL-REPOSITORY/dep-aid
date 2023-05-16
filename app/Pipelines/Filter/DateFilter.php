<?php

namespace App\Pipelines\Filter;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class DateFilter
{
    public function handle(Builder $query, Closure $next)
    {

        if (request()->has('from_date_patient_tbl') && request()->has('to_date_patient_tbl')) {
            $from = date('Y-m-d' . ' 00:00:00', strtotime(request('from_date_patient_tbl')));
            $to = date('Y-m-d' . ' 00:00:00', strtotime(request('to_date_patient_tbl')));

            $query->join('schedules','patient_form.id','=','schedules.patient_form_id','INNER')
            ->whereBetween('schedules.start_date', [$from, $to]);

        } else if (request()->has('from_date_manufacturer_inventory_tbl') && request()->has('to_date_manufacturer_inventory_tbl')) {
            $from = date('Y-m-d' . ' 00:00:00', strtotime(request('from_date_manufacturer_inventory_tbl')));
            $to = date('Y-m-d' . ' 00:00:00', strtotime(request('to_date_manufacturer_inventory_tbl')));

            $query->whereBetween('manufacturer_date', [$from, $to]);

        } else if (request()->has('from_date_expiration_inventory_tbl') && request()->has('to_date_expiration_inventory_tbl')) {
            $from = date('Y-m-d' . ' 00:00:00', strtotime(request('from_date_expiration_inventory_tbl')));
            $to = date('Y-m-d' . ' 00:00:00', strtotime(request('to_date_expiration_inventory_tbl')));

            $query->whereBetween('expiration_date', [$from, $to]);

        }

        return $next($query);
    }
}