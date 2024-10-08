<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Controle;

class ControleSeeder extends Seeder
{
    public function run()
    {
        Controle::create([
            'id_funcionario' => 1,
            'id_vacina' => 1,
            'dose' => 1,
            'data_aplicacao' => '2023-01-10'
        ]);

        Controle::create([
            'id_funcionario' => 2,
            'id_vacina' => 2,
            'dose' => 1,
            'data_aplicacao' => '2023-02-15'
        ]);
    }
}
