<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreReq extends FormRequest
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
            'username' => 'required|string|max:20|unique:users,username',
            'email' => 'required|string|email|max:50|unique:users,email',
            'first_name' => 'required|string|max:10',
            'last_name' => 'required|string|max:10',
            'password' => 'required|string|min:8|confirmed',
 
        ];
    }
}
