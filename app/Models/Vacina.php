<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacina extends Model
{
    use HasFactory;

    protected $table = 'vacinas';

    protected $fillable = [
        'nome',
        'lote',
        'data_validade',
    ];

    public function funcionarios()
    {
        return $this->belongsToMany(Funcionario::class, 'controle', 'id_vacina', 'id_funcionario')
            ->withPivot('dose', 'data_aplicacao')
            ->withTimestamps();
    }
}
