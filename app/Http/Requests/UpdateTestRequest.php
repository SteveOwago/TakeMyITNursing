<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(!(auth()->user()->can('admin_management')|| auth()->user()->hasrole('Admin')),403);
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
            'name' => 'required',
            'subject_category_id' => 'required|integer',
            'max_number_of_questions' => 'required',
            'test_duration' => 'required|integer',
        ];
    }
}
