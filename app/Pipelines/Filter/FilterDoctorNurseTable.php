<?php

namespace App\Pipelines\Filter;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class FilterDoctorNurseTable
{
    public function handle(Builder $query, Closure $next)
    {
        if (request()->has('position') ||request()->has('specialization') || request()->has('availability')) {
            $query->where('position', request('position'))
                ->orWhere('specialization', request('specialization'))
                ->orWhere('availability', request('availability'));
        }

        return $next($query);
    }
}