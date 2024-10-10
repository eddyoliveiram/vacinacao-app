<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Controle;

class DoseNaoRepetida implements Rule
{
    protected $idFuncionario;

    public function __construct($idFuncionario)
    {
        $this->idFuncionario = $idFuncionario;
    }

    public function passes($attribute, $value)
    {
        return !Controle::where('id_funcionario', $this->idFuncionario)
            ->where('dose', $value)
            ->exists();
    }

    public function message()
    {
        return 'Este funcionário já recebeu esta dose de vacinação.';
    }
}
