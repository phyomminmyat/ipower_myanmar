<?php

namespace App\Http\Requests\Backend\Community;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommunityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return true;
        return access()->allow('update-community');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'village_tract_id' => 'required',
            'community_name' => 'required',
            'community_code' => 'required',
            'description' => 'required',
        ];
    }
}
