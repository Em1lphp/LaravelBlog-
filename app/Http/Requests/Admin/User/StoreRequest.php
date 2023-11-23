<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;                        //меняю на true
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'     => 'required|string',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|min:8|regex:/^(?=.*[A-Za-z])(?=.*\d)/',
            // требует минимум 8 символов и наличие минимум 1 цифры,буквы
            'role'     => 'required|integer',
        ];
    }

    public function messages()  // сообщения с ошибкой
    {
        return [
            'name.required'     => 'Поле имя обязательно для заполнения.',
            'name.string'       => 'Поле имя должно быть строкой.',
            'email.required'    => 'Поле email обязательно для заполнения.',
            'email.email'       => 'Поле email должно быть в формате электронной почты.',
            'email.unique'      => 'Пользователь с таким email уже существует.',
            'password.required' => 'Поле пароль обязательно для заполнения.',
            'password.string'   => 'Поле пароль должно быть строкой.',
            'password.min'      => 'Пароль должен содержать как минимум :min символов.',
            'password.regex'    => 'Пароль должен содержать хотя бы одну букву и одну цифру.',
        ];
    }

}
