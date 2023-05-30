<?php

namespace App\Pipelines\Search;

use Illuminate\Database\Eloquent\Builder;
use Closure;

class SearchPatientTable
{
    public function handle(Builder $query, Closure $next)
    {
        if (request()->has('search')) {
            $query->where(function ($query) {
                $query->orWhere('firstname', 'LIKE', "%" . request('search') . "%")
                    ->orWhere('middlename', 'LIKE', "%" . request('search') . "%")
                    ->orWhere('lastname', 'LIKE', "%" . request('search') . "%")
                    ->orWhere('main_reason_for_consultation', 'LIKE', "%" . request('search') . "%")
                    ->orWhere('other_reason_for_consultation', 'LIKE', "%" . request('search') . "%")
                    ->orWhere('diagnosis', 'LIKE', "%" . request('search') . "%");
            });
        }
        $next($query);
    }
}
