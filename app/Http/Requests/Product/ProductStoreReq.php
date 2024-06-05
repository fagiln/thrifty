<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreReq extends FormRequest
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
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:category,id', // asumsikan tabel categories dan kolom id ada
            'stock' => 'required|integer|min:0',
            'img_path' => 'required|image|mimes:jpeg,jpg,png|max:2048', // atau 'required|image' jika mengharuskan gambar
            'description' => 'nullable|string',
        ];
    }
}
