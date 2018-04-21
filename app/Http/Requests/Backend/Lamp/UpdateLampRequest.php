<?php

namespace App\Http\Requests\Backend\Lamp;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLampRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('update-lamp');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'street_id' => 'required',
            'lamp_post_name' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ];
    }
}
