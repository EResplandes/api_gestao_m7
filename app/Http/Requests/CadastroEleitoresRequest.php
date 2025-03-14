<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadastroEleitoresRequest extends FormRequest
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
            'nome' => 'required',
            'sobrenome' => 'required',
            'telefone' => 'integer',
            'telefone_secundario' => 'integer',
            'email' => 'required|email',
            'is_whatsapp' => 'boolean',
            'sexo' => 'required',
            'data_nascimento' => 'required|date',
            'cpf' => 'required|min:11|max:11|unique:users',
            'titulo_eleitor' => 'required',
            'padrinhoId' => 'integer',
            'logradouro' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'cep' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'email' => 'O campo :attribute deve ser um email válido.',
            'min' => 'O campo :attribute deve ter no mínimo :min caracteres.',
            'max' => 'O campo :attribute deve ter no máximo :max caracteres.',
            'unique' => 'O campo :attribute já está em uso.',
            'integer' => 'O campo :attribute deve ser um número inteiro.',
            'date' => 'O campo :attribute deve ser uma data válida.',
        ];
    }
}
