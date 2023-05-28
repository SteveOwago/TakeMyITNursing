<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(!(auth()->user()->can('test_management') || auth()->user()->hasrole('Admin')), 403);
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
            'question' => 'required',
            'answer' => 'required',
            'short_answer' => 'required',
            'full_answer' => 'required',
            'answer_resource' => 'required',
        ];
    }
}
