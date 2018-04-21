<?php

namespace App\Http\Requests\Backend\Lamp;

use Illuminate\Foundation\Http\FormRequest;

class StoreLampRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return true;
        return access()->allow('store-lamp');
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
