<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionarioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'CPF' => 'required|unique:funcionarios,CPF|size:11',
            'nome_completo' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'portador_comorbidade' => 'required|boolean',
        ];
    }
}
