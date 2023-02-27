<?php

namespace App\Pipelines\Search;

use Illuminate\Database\Eloquent\Builder;
use Closure;

class SearchInventoryTable
{
    public function handle(Builder $query, Closure $next)
    {
        if (request()->has('search')) {
            $query->where(function($query){
                $query->orWhere('inventory.medicine_name', 'LIKE', "%".request('search')."%")
                    ->orWhere('inventory.brand', 'LIKE', "%".request('search')."%");
            });
        }
        $next($query);
    }
}