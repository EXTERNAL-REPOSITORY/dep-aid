<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientsRequest extends FormRequest
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
            'patient_name' => ['string', 'nullable'],
            'scheduled_appointment' => ['date', 'nullable'],
            'reasons_for_consultation' => ['string', 'nullable'],
            'remarks' => ['string', 'nullable']
        ];
    }
}
