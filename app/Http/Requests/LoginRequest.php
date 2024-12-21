<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**

     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'login' => 'required|string|exists:users,login',
            'password' => 'required|string',
        ];
    }

    // Override the failedValidation method to change the behavior on error
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new ValidationException(
            $validator,
            redirect()->route('login')
            ->withInput() // Сохраняем введённые данные в сессии
            ->with('error', 'Invalid login or password')
        );
    }
}
