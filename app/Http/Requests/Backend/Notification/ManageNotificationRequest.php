<?php

namespace App\Http\Requests\Backend\Notification;

use Illuminate\Foundation\Http\FormRequest;

class ManageNotificationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return true;
        return access()->allow('manage-notification');
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
            'name' => 'required',
            'description' => 'required',
        ];
    }
}
