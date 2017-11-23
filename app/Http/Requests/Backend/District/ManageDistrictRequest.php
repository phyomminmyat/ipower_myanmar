<?php

namespace App\Http\Requests\Backend\District;

use Illuminate\Foundation\Http\FormRequest;

class ManageDistrictRequest extends FormRequest
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
            'region_id' => 'required',
            'district_name' => 'required',
            'district_code' => 'required',
            'description' => 'required',
        ];
    }
}
