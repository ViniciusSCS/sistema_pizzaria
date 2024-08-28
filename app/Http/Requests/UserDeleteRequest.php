<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserDeleteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Aqui você pode adicionar lógica para verificar se o usuário tem permissão para deletar
        // Por exemplo, checar roles, permissões, etc.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Caso precise validar algo antes de deletar, adicione as regras aqui
        return [];
    }

    /**
     * Get custom messages for validation errors.
     */
    public function messages(): array
    {
        return [
            // Personalize mensagens de erro aqui, se necessário
        ];
    }
}
