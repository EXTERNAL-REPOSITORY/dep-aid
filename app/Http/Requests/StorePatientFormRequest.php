<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['string', 'nullable'],
            'age' => ['integer', 'nullable'],
            'gender' => ['string', 'nullable'],
            'address' => ['string', 'nullable'],
            'appointment' => ['datetime', 'nullable'],
            'doctor_consulting' => ['string', 'nullable'],
            'vital_signs' => ['string', 'nullable'],
            'heart_rate' => ['integer', 'nullable'],
            'blood_pressure' => ['string', 'nullable'],
            'temperature' => ['integer', 'nullable'],
            'oxygen_saturation' => ['integer', 'nullable'],
            'reason_for_consultation' => ['string', 'nullable'],
            'allergies' => ['string', 'nullable'],
            'maintenance_medications' => ['string', 'nullable'],
            'current_medications' => ['string', 'nullable'],
        ];
    }
}
