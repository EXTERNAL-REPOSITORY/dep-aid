<?php

namespace App\Pipelines\Filter;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class FilterDoctorNurseTable
{
    public function handle(Builder $query, Closure $next)
    {
        if (request()->has('day')) {
            $query->where('availability_days', request('day'));
        }

        return $next($query);
    }
}