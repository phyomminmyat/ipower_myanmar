<?php

namespace App\Http\Requests\Backend\UnitRate;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUnitRateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'meter_type' => 'required',
            'unit_price' => 'required',
        ];
    }
}
