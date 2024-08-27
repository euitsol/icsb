<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }
    public function rules(): array
    {
        return [
            'name' => 'required|min:6',
            'status' => 'nullable|boolean',
            'role' => 'nullable|exists:roles,id',

        ]
            +
            ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'email' => 'required|unique:users,email,NULL,id,deleted_at,NULL',
            // 'password' => 'required|min:6|confirmed',
            'password' => [
                'required',
                'string',
                'confirmed',
                Password::min(8) // Minimum length of 8 characters
                    ->mixedCase() // Requires at least one uppercase and one lowercase letter
                    ->letters() // Requires at least one letter
                    ->numbers() // Requires at least one digit
                    ->symbols() // Requires at least one special character
                    ->uncompromised(), // Ensures the password has not been compromised in data leaks
            ],
        ];
    }

    protected function update(): array
    {
        return [
            'email' => 'required|unique:users,email,' . $this->route('id') . ',id,deleted_at,NULL',
            // 'password' => 'nullable|min:6|confirmed',
            'password' => [
                'nullable',
                'string',
                'confirmed',
                Password::min(8) // Minimum length of 8 characters
                    ->mixedCase() // Requires at least one uppercase and one lowercase letter
                    ->letters() // Requires at least one letter
                    ->numbers() // Requires at least one digit
                    ->symbols() // Requires at least one special character
                    ->uncompromised(), // Ensures the password has not been compromised in data leaks
            ],
        ];
    }
}
