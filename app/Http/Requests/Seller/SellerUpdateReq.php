<?php

namespace App\Http\Requests\Seller;

use Illuminate\Foundation\Http\FormRequest;

class SellerUpdateReq extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|string|max:20',
            'email' => 'required|string|email|max:50',
            'first_name' => 'required|string|max:10',
            'file' => 'nullable|mimes:png,jpg,jpeg',
            'last_name' => 'nullable|string|max:10',
            'password' => 'required|string|min:8|confirmed',

        ];
    }
}
