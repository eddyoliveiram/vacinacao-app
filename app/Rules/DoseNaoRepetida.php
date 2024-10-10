<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Controle;

class DoseNaoRepetida implements Rule
{
    protected $idFuncionario;
    protected $idControle;

    public function __construct($idFuncionario, $idControle)
    {
        $this->idFuncionario = $idFuncionario;
        $this->idControle = $idControle;
    }

    public function passes($attribute, $value)
    {
        return !Controle::where('id_funcionario', $this->idFuncionario)
            ->where('dose', $value)
            ->when($this->idControle, function($query) {
                return $query->where('id', '!=', $this->idControle);
            })
            ->exists();
    }

    public function message()
    {
        return 'Este funcionário já recebeu esta dose de vacinação.';
    }
}
