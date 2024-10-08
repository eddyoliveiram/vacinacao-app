<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FuncionarioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $funcionarioId = $this->route('funcionario');

        return [
            'cpf' => [
                'required',
                'string',
                'max:14',
                Rule::unique('funcionarios')->ignore($funcionarioId),
            ],
            'nome_completo' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'comorbidade' => 'required|boolean',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'comorbidade' => $this->comorbidade == '1' ? true : false,
        ]);
    }

}
