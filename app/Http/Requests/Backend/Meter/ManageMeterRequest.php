<?php

namespace App\Http\Requests\Backend\Meter;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ManageMeterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return true;
        return access()->allow('manage-meter');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'meter_no'         => 'required',
            'owner_id'          => 'required',
            'region_id'         => 'required',
            'district_id'       => 'required',
            'township_id'       => 'required',
            'village_tract_id'  => 'required',
            'community_id'      => 'required',
            'address'           => 'required',
            'street_id'         => 'required',
        ];
    }
}
