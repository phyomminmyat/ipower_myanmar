<?php

namespace App\Http\Requests\Backend\Transformer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTransformerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('update-transformer');
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
            'transformer_name' => 'required',
            'qrcode' => 'required',
        ];
    }
}
