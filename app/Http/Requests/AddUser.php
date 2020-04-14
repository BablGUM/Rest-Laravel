<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUser extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'login' => 'required|unique:users|min:6',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required_with:password',
            'phone' => 'required|unique:users|min:11',
            'first_name' => 'required|min:2',
            'surname' => 'required|min:2',

        ];
    }

    public function messages()
    {
        return [
            'unique' => 'Пользователь с такими данными уже существует',
            'required' => 'Поле :attribute является обязательным',
            'min' => 'Поле :attribute должно содержать минимум :min символа(ов)',
            'confirmed' => 'Пароли должны совпадать'
        ];
    }
}
