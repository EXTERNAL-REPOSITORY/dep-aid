<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientForm extends Model
{
    use HasFactory;

    protected $table = 'patient_form';
    protected $fillable = [
        'name', 
        'age', 
        'gender', 
        'address', 
        'appointment', 
        'doctor_consulting', 
        'vital_signs', 
        'heart_rate', 
        'blood_pressure', 
        'temperature', 
        'oxygen_saturation',
        'reason_for_consultation',
        'allergies',
        'maintenance_medications',
        'current_medications'
    ];
    protected $guarded = [];
}
