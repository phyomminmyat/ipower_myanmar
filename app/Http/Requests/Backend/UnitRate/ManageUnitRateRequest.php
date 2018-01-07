<?php

namespace App\Http\Requests\Backend\UnitRate;

use Illuminate\Foundation\Http\FormRequest;

class ManageUnitRateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return true;
        return access()->allow('manage-unit-rate');
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
