<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\DipensedMedicinesFactory;

class DispensedMedicines extends Model
{
    use HasFactory;

    protected $table = 'dispensed_medicines';
    protected $fillable = ['medicine_id', 'patient_form_id', 'patient_name', 'quantity', 'remarks', 'created_at', 'updated_at'];

    /** @return DipensedMedicinesFactory */
    protected static function newFactory()
    {
        return DipensedMedicinesFactory::new();
    }
}
