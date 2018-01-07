<?php

namespace App\Http\Requests\Backend\Access\Permission;

use App\Http\Requests\Request;

/**
 * Class StorePermissionRequest.
 */
class StorePermissionRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return access()->hasRole(1);
        return access()->allow('store-permissions');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:191',
        ];
    }
}
