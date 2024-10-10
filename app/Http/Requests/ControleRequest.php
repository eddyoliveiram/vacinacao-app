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
        return [
            'id_funcionario' => 'required|exists:funcionarios,id',
            'id_vacina' => 'required|exists:vacinas,id',
            'dose' => [
                'required',
                'integer',
                new DoseNaoRepetida($this->id_funcionario)
            ],
            'data_aplicacao' => 'required|date',
        ];
    }
}
