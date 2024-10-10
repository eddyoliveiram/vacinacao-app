<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $table = 'funcionarios';

    protected $fillable = [
        'cpf',
        'nome_completo',
        'data_nascimento',
        'comorbidade',
    ];

    public function vacinas()
    {
        return $this->belongsToMany(Vacina::class, 'controle', 'id_funcionario', 'id_vacina')
            ->withPivot('id', 'dose', 'data_aplicacao')
            ->orderBy('controle.dose');
    }

    public function getCpfAttribute($value)
    {
        return substr($value, 0, 3) . '.***.***-**';
    }
}
