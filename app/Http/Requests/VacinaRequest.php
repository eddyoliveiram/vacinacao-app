<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class VacinaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'lote' => 'required|string|max:50',
            'data_validade' => [
                'required',
                'date',
                'after_or_equal:' . Carbon::now()->format('d/m/Y'),
            ],
        ];
    }
}
