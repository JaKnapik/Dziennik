<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PassRequest extends FormRequest
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
            'password' => 'required|confirmed|max: 255',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Podaj hasło',
            'password.confirmed' => 'Potwierdzone hasło jest niepoprawne'
        ];
    }
}
