<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'max:30'
            ],
            'surname' => [
                'required',
                'string',
                'max:30'
            ],
            'email' => [
                'required',
                'unique:users',
                'string',
                'email',
                'max:30'
            ],
            'password' => [
                'confirmed',
                'string',
                'nullable',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^\w\s]).{8,}/',
            ]
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Не оставляйте это поле пустым.',
            'unique' => 'Пользователь с таким email адресом уже зарегистрирован.',
            'max' => 'Превышено максимальное значение.',
            'password.regex' => 'Пароль должен быть не короче 8 символов, содержать строчные и заглавные буквы латинского алфавита, цифры и спец. символы.',
            'confirmed' => 'Пароли не совпадают.'
        ];
    }
}
