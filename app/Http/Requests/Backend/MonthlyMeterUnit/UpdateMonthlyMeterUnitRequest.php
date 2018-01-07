<?php

namespace App\Http\Requests\Backend\MonthlyMeterUnit;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMonthlyMeterUnitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return true;
        return access()->allow('update-monthly-meter-unit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'meter_id'              => 'required',
            'read_date'             => 'required',
            'prev_unit'             => 'required',
            'reading_unit'          => 'required',
            'usage_unit'            => 'required',
            'total_amount'          => 'required',
            'payable_amount'        => 'required',
            'received_amount'       => 'required',
            'penalty_amount'        => 'required',
            'tax_amount'            => 'required',
            'tax_percentage'        => 'required',
            'service_percentage'    => 'required',
            'service_amount'        => 'required',
        ];
    }
}
