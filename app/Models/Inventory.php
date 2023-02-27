<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $table = 'inventory';
    protected $fillable = ['medicine_name', 'brand', 'beginning_balance', 'reorder_level', 'stock_balance', 'manufacturer_date', 'expiration_date', 'type'];
    protected $guarded = [];

    // protected $casts = [
    //     'manufacturer_date'  => 'datetime:MM dd, YYYY',
    //     'expiration_date' => 'datetime:MM dd, YYYY',
    // ];
}
