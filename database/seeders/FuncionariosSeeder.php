<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Funcionario;

class FuncionariosSeeder extends Seeder
{
    public function run()
    {
        Funcionario::create([
            'cpf' => '12345678901',
            'nome_completo' => 'João Silva',
            'data_nascimento' => '1985-05-15',
            'portador_comorbidade' => false
        ]);

        Funcionario::create([
            'cpf' => '10987654321',
            'nome_completo' => 'Maria Santos',
            'data_nascimento' => '1990-09-10',
            'portador_comorbidade' => true
        ]);
    }
}
