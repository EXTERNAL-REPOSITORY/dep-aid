<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PatientForm;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedules';
    protected $fillable = ['patient_information', 'text', 'start_date', 'end_date','patient_form_id','attending_id'];
    protected $guarded = [];
}
