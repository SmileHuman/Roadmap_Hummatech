<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class AllValidateRequests extends FormRequest
{

    public function rules(): array
    {
        if ($this->isMethod('POST')) {
            return [
                'email' => 'required|email|unique:akun_users,email',
                'password' => 'required|min:8'
            ];
        }

        return [
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'email wajib diisi',
            'email.email' => 'kolom email tidak berupa email',
            'email.unique' => 'email sudah digunakan digunakan',
            'password.required' => 'password wajib diisi',
            'password.min' => 'password minimal 8 karakter',
        ];
    }
}
