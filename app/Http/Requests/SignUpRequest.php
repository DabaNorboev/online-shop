<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
            'first_name' => 'required|min:2|max:20',
            'last_name' => 'required|min:4|max:30',
            'email' => 'required|email|unique:users|max:100',
            'password' => 'required|min:6|confirmed|max:100',
            'password_confirmation' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Поле не должно быть пустым',
            'first_name.min' => 'Минимальная длина поля - 2 символа',
            'first_name.max' => 'Максимальная длина поля - 20 символов',

            'last_name.required' => 'Поле не должно быть пустым',
            'last_name.min' => 'Минимальная длина поля - 4 символа',
            'last_name.max' => 'Максимальная длина поля - 30 символов',

            'email.required' => 'Поле не должно быть пустым',
            'email.email' => 'Поле должно содержать @',
            'email.unique' => 'Данный email уже зарегистрирован',
            'email.max' => 'Максимальная длина поля - 100 символов',

            'password|required' => 'Поле не должно быть пустым',
            'password|confirmed' => 'Пароли должны совпадать',
            'password|min' => 'Минимальная длина пароля - 6 символов',
            'password|max' => 'Максимальная длина пароля - 100 символов',

            'password_confirmation|required' => 'Поле не должно быть пустым',
        ];
    }
}
