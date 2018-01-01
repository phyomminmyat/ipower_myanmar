<?php

namespace App\Http\Requests\Backend\Street;

use Illuminate\Foundation\Http\FormRequest;

class ManageStreetRequest extends FormRequest
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
            'community_id' => 'required',
            'street_name' => 'required',
            'street_code' => 'required',
            'description' => 'required',
        ];
    }
}
