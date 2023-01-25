<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'patients';
    protected $fillable = ['patient_name', 'scheduled_appointment', 'reasons_for_consultation', 'remarks'];
    protected $guarded = [];
}
