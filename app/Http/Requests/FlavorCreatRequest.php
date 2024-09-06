<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FlavorCreatRequest extends FormRequest
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
            'sabor' => 'required|string',
            'tamanho' => 'required|string',
            'preco' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'string' => 'O campo :attribute deve ser uma string.',
            'numeric' => 'O campo :attribute deve ser um número.',
        ];
    }
}
