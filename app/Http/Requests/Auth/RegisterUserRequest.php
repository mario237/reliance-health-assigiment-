<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required' , 'string' , 'min:3' , 'max:100'],
            'email' => ['required' , 'email' , 'max:255' , Rule::unique('users' , 'email')->ignore($this['id'])],
            'balance' => ['required' , 'numeric' , 'min:1'],
            'currency' => ['required' , 'string' , 'max:3'],
            'password' => ['required' , 'min:8']
        ];
    }
}
