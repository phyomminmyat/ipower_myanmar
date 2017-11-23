<?php

namespace App\Http\Requests\Backend\Department;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepartmentRequest extends FormRequest
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
            'district_id' => 'required',
            'township_id' => 'required',
            'village_tract_id' => 'required',
            'community_id' => 'required',
            'department_name' => 'required',
            'department_code' => 'required',
            'description' => 'required',
        ];
    }
}
