<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Schedule;

class PatientForm extends Model
{
    use HasFactory;

    protected $table = 'patient_form';
    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'name',
        'birthdate',
        'age',
        'height',
        'weight',
        'gender',
        'email',
        'contact_number',
        'address',
        'appointment',
        'doctor_consulting',
        'vital_signs',
        'heart_rate',
        'respiratory_rate',
        'blood_pressure_systolic',
        'blood_pressure_diastolic',
        'temperature',
        'oxygen_saturation',
        'main_reason_for_consultation',
        'other_reason_for_consultation',
        'allergies',
        'maintenance_medications',
        'current_medications',
        'date',
        'day',
        'diagnosis',
        'available_from',
        'available_to'

    ];
    protected $guarded = [];

    public function schedule()
    {
        return $this->hasOne(Schedule::class, 'patient_form_id', 'id');
    }
}
