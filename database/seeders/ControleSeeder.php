<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Controle;
use App\Models\Funcionario;
use App\Models\Vacina;

class ControleSeeder extends Seeder
{
    public function run()
    {
        $funcionarios = Funcionario::orderBy('nome_completo', 'asc')->get();

        $vacinas = Vacina::all();

        if ($funcionarios->isEmpty() || $vacinas->count() < 3) {
            $this->command->error('É necessário ter pelo menos 1 funcionário e 3 vacinas para executar o ControleSeeder.');
            return;
        }

        $primeiroFuncionario = $funcionarios->first();

        foreach ($vacinas->take(3) as $index => $vacina) {
            Controle::create([
                'id_funcionario' => $primeiroFuncionario->id,
                'id_vacina' => $vacina->id,
                'dose' => $index + 1,
                'data_aplicacao' => now()->subDays(30 * ($index + 1))->format('Y-m-d'),
            ]);
        }

        $funcionarios->shift();

        foreach ($funcionarios as $index => $funcionario) {
            if ($index % 2 == 0) {
                Controle::create([
                    'id_funcionario' => $funcionario->id,
                    'id_vacina' => $vacinas->random()->id,
                    'dose' => 1,
                    'data_aplicacao' => now()->subDays(15)->format('Y-m-d'),
                ]);
            }
        }
    }
}
