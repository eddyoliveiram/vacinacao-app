<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\ValidaCpf;

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
                $this->isMethod('post') ? 'required' : 'sometimes',
                'string',
                'max:14',
                new ValidaCpf(),
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
