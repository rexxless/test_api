<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHotelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->is_admin ?? false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'sometimes',
                'string',
                'max:100',
            ],
            'description' => [
                'sometimes',
                'nullable',
                'string',
                'max:255'
            ],
            'city' => [
                'sometimes',
                'string',
                'max:25',
            ],
            'website' => [
                'sometimes',
                'max:255'
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
            'name.string' => 'Поле "name" должно быть строкой.',
            'name.max' => 'Поле "name" не должно превышать 100 символов.',
            'description.string' => 'Поле "description" должно быть строкой.',
            'description.max' => 'Поле "description" не должно превышать 255 символов.',
            'city.string' => 'Поле "city" должно быть строкой.',
            'city.max' => 'Поле "city" не должно превышать 25 символов.',
            'website.max' => 'Поле "website" не должно превышать 255 символов.'
        ];
    }
}
