<?php

namespace App\Http\Requests\Backend\VillageTract;

use Illuminate\Foundation\Http\FormRequest;

class StoreVillageTractRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return true;
        return access()->allow('store-village-tract');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'township_id' => 'required',
            'village_name' => 'required',
            'village_code' => 'required',
            'description' => 'required',
        ];
    }
}
