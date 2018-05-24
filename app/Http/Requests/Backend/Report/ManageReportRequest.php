<?php

namespace App\Http\Requests\Backend\Report;

use Illuminate\Foundation\Http\FormRequest;

class ManageReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('manage-report');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'report_type_id' => 'required',
            'report_name' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'datetime' => 'required',
        ];
    }
}
