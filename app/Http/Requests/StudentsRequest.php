<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentsRequest extends FormRequest
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
            'name' => 'required|max: 255',
            'surname' => 'required|max:255',
            'pesel' => 'required|min:11|max:11',
            'section' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Należy podać imię',
            'surname.required' => 'Należy podać nazwisko',
            'pesel.required' => 'Należy podać PESEL',
            'section.required' => 'Należy wybrać oddział',
            'name.max' => 'Imię nie może być dłuższe niż 255 znaków',
            'surname.max' => 'Nazwisko nie może być dłuższe niż 255 znaków',
            'pesel.max' => 'PESEL musi miec 11 znaków',
            'pesel.min' => 'PESEL musi miec 11 znaków',
        ];
    }
}
