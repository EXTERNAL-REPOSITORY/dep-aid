<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DespensedMedicines extends Model
{
    use HasFactory;
    protected $table = 'despensed_medicines';
    protected $fillable = ['quantity'];
}
