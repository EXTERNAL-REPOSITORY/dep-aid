<?php

namespace App\Pipelines\Search;

use Illuminate\Database\Eloquent\Builder;
use Closure;

class SearchDoctorNurseTable
{
    public function handle(Builder $query, Closure $next)
    {
        if (request()->has('search')) {
            $query->where(function($query){
                $query->orWhere('employee_id', 'LIKE', "%".request('search')."%")
                    ->orWhere('first_name', 'LIKE', "%".request('search')."%")
                    ->orWhere('middle_name', 'LIKE', "%".request('search')."%")
                    ->orWhere('last_name', 'LIKE', "%".request('search')."%")
                    ->orWhere('position', 'LIKE', "%".request('search')."%");
            });
        }
        $next($query);
    }
}