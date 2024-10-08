<?php

namespace App\Http\Requests;

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
            'dose' => 'required|integer',
            'data_aplicacao' => 'required|date',
        ];
    }
}
