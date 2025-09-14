<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'string',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,}$/',
                'max:255',
                'unique:users,email'
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:100'
            ]
        ];
    }

    /**
     * Get custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'email.required' => 'Поле "email" обязательно для заполнения.',
            'email.unique' => 'Аккаунт с таким email уже существует',
            'email.string' => 'Поле "email" должно быть строкой.',
            'email.regex' => 'Поле "email" должно содержать корректный email адрес.',
            'email.max' => 'Поле "email" не должно превышать 255 символов.',
            'password.required' => 'Поле "password" обязательно для заполнения.',
            'password.string' => 'Поле "password" должно быть строкой.',
            'password.min' => 'Поле "password" должно содержать минимум 8 символов.',
            'password.max' => 'Поле "password" не должно превышать 100 символов.'
        ];
    }
}
