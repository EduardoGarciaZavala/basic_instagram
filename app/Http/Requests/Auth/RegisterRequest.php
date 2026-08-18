<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Override;

class RegisterRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    #[Override]
    protected function prepareForValidation()
    {
        $this->merge([
            'email' => strtolower($this->email),
            'name' => strtolower($this->name),
            'username' => strtolower($this->username)
        ]);
        return parent::prepareForValidation();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|string|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
            'birthdate' => 'required|date',
            'name' => 'required|string|max:30',
            'username' => 'required|string|min:8|max:25|unique:users,username|regex:/^[a-zA-Z0-9]+$/',
        ];
    }
}
