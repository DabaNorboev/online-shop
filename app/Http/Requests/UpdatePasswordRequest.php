<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
            'old_password' => 'required|min:6|max:100',

            'password' => 'required|min:6|confirmed|max:100',
            'password_confirmation' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'old_password.required' => 'Поле не должно быть пустым',
            'old_password.min' => 'Минимальная длина пароля - 6 символов',
            'old_password.max' => 'Максимальная длина пароля - 100 символов',

            'password.required' => 'Поле не должно быть пустым',
            'password.confirmed' => 'Пароли должны совпадать',
            'password.min' => 'Минимальная длина пароля - 6 символов',
            'password.max' => 'Максимальная длина пароля - 100 символов',

            'password_confirmation.required' => 'Поле не должно быть пустым',
        ];
    }
}
