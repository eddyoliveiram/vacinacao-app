<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Controle extends Model
{
    use HasFactory;

    protected $table = 'controle';

    protected $fillable = [
        'id_funcionario',
        'id_vacina',
        'dose',
        'data_aplicacao',
    ];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'id_funcionario');
    }

    public function vacina()
    {
        return $this->belongsTo(Vacina::class, 'id_vacina');
    }
}
