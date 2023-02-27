<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangays extends Model
{
    use HasFactory;

    protected $table = 'barangays';
    protected $fillable = ['barangay_name','district_id'];
    protected $guarded = [];
}
