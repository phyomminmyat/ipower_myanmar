<?php

namespace App\Http\Requests\Backend\MeterOwner;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMeterOwnerRequest extends FormRequest
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
            'nric_township'     => 'required',
            'name'              => 'required',
            'nric_code'         => 'required',
            'email'             => ['required', 'email', 'max:191', Rule::unique('users')],
            'password'          => 'required|min:6',
            'dob'               => 'required',
            'contact_no'        => 'required',
            'fax_no'            => 'required',
            'nric_code'         => 'required',
            'gender'            => 'required',
            'martial_status'    => 'required',
            'nationality'       => 'required',
            'address'           => 'required',
            'position'          => 'required',
        ];
    }
}
