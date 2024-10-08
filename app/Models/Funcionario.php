<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $table = 'funcionarios';

    protected $fillable = [
        'CPF',
        'nome_completo',
        'data_nascimento',
        'portador_comorbidade',
    ];

    public function vacinas()
    {
        return $this->belongsToMany(Vacina::class, 'controle', 'id_funcionario', 'id_vacina')
            ->withPivot('dose', 'data_aplicacao')
            ->withTimestamps();
    }
}
