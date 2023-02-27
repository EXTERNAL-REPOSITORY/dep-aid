<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplenisedMedicines extends Model
{
    use HasFactory;
    protected $table = 'replenished_medicines';
    protected $fillable = ['quantity'];
}
