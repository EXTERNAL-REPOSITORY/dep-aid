<?php

namespace App\Pipelines\Filter;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class FilterDoctorNurseTable
{
    public function handle(Builder $query, Closure $next)
    {
        if (request()->has('type')) {
            $query->where('type', request('type'));
        }

        return $next($query);
    }
}