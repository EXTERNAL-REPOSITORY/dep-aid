<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInventoryRequest extends FormRequest
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
            'medicine_name' => ['string', 'nullable'],
            'brand' => ['string', 'nullable'],
            'manufacturer_date' => ['string', 'nullable'],
            'expiration_date' => ['string', 'nullable'],
            'type' => ['string', 'nullable']
        ];
    }
}
