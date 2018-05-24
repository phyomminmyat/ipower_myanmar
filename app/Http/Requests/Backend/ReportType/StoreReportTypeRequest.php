<?php

namespace App\Http\Requests\Backend\ReportType;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('store-report-type');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type_name' => 'required',
            'description' => 'required',
        ];
    }
}
