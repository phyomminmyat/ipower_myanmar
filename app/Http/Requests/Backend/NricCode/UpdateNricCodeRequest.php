<?php

namespace App\Http\Requests\Backend\NricCode;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNricCodeRequest extends FormRequest
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
            'nric_code' => 'required',
            'description' => 'required',
        ];
    }
}
