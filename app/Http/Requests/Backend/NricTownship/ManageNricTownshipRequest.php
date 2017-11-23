<?php

namespace App\Http\Requests\Backend\NricTownship;

use Illuminate\Foundation\Http\FormRequest;

class ManageNricTownshipRequest extends FormRequest
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
            'nric_code_id' => 'required',
            'short_name' => 'required',
            'serial_no' => 'required',
        ];
    }
}
