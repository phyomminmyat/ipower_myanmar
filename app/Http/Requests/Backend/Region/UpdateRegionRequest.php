<?php

namespace App\Http\Requests\Backend\Region;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRegionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return true;
        return access()->allow('update-region');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'region_name' => 'required',
            'region_code' => 'required',
            'description' => 'required',
        ];
    }
}
