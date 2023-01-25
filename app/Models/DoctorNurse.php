<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorNurse extends Model
{
    use HasFactory;

    protected $table = 'doctor_nurse';
    protected $fillable = ['first_name', 'middle_name', 'last_name', 'position', 'specialization', 'availability'];
    protected $guarded = [];
}
