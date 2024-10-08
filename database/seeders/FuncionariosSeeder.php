<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Funcionario;
use Faker\Factory as Faker;

class FuncionariosSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('pt_BR');

        for ($i = 0; $i < 10; $i++) {
            Funcionario::create([
                'cpf' => $faker->cpf,
                'nome_completo' => $faker->name,
                'data_nascimento' => $faker->date('Y-m-d', '2000-01-01'),
                'comorbidade' => $faker->boolean
            ]);
        }
    }
}
