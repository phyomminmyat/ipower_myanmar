<?php

namespace App\Http\Requests\Backend\Township;

use Illuminate\Foundation\Http\FormRequest;

class ManageTownshipRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return true;
        return access()->allow('manage-township');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'district_id' => 'required',
            'township_name' => 'required',
            'township_code' => 'required',
            'description' => 'required',
        ];
    }
}
