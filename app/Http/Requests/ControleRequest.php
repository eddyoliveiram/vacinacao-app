<?php

namespace App\Http\Requests;

use App\Models\Controle;
use App\Rules\DoseNaoRepetida;
use Illuminate\Foundation\Http\FormRequest;

class ControleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $idFuncionario = $this->id_funcionario;
        $idControle = $this->route('controle');

        return [
            'id_funcionario' => 'required|exists:funcionarios,id',
            'id_vacina' => 'required|exists:vacinas,id',
            'dose' => [
                'required',
                'integer',
                new DoseNaoRepetida($idFuncionario, $idControle)
            ],
            'data_aplicacao' => 'required|date',
        ];
    }
}
