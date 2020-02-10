<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradesRequest extends FormRequest
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
            'grade' => 'required|integer|between:1,6',
            'description' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'grade.required' => 'Należy podać ocenę',
            'description.required' => 'Należy podać opis oceny',
        ];
    }
}
