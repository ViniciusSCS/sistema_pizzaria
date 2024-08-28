<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserEditRequest extends FormRequest
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
        $userId = $this->route('user'); // Obtém o ID do usuário da rota, se disponível

        return [
            'name' => 'required|string|max:50',
            'email' => "required|string|email|max:255|unique:users,email,{$userId}",
            'password' => [
                'nullable', // Permite que a senha seja nula, pois o usuário não precisa alterar a senha ao editar
                'string',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
            'password_confirmation' => 'nullable|same:password'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'string' => 'O campo :attribute deve ser uma string.',
            'max' => 'O campo :attribute deve ter no máximo :max caracteres.',
            'email' => 'O campo :attribute não é válido.',
            'unique' => 'O campo :attribute já está em uso.',
            'confirmed' => 'O campo :attribute não confere.',
            'same' => 'Os campos confirmação da senha e senha devem corresponder.',
            'min' => 'O campo :attribute deve ter no mínimo :min caracteres.',
            'letters' => 'O campo :attribute deve conter ao menos uma letra.',
            'mixedCase' => 'O campo :attribute deve conter ao menos uma letra maiúscula e uma letra minúscula.',
            'symbols' => 'O campo :attribute deve conter ao menos um símbolo.',
            'numbers' => 'O campo :attribute deve conter ao menos um número.'
        ];
    }
}
