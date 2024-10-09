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
        $cpfsUtilizados = [];

        for ($i = 0; $i < 10; $i++) {
            do {
                $cpf = gerarCpfValido();
            } while (in_array($cpf, $cpfsUtilizados));

            $cpfsUtilizados[] = $cpf;

            Funcionario::create([
                'cpf' => $cpf,
                'nome_completo' => $faker->name,
                'data_nascimento' => $faker->date('Y-m-d', '2000-01-01'),
                'comorbidade' => $faker->boolean
            ]);
        }
    }
}

function gerarCpfValido()
{
    $cpf = [];

    for ($i = 0; $i < 9; $i++) {
        $cpf[] = rand(0, 9);
    }

    $soma = 0;
    for ($i = 0, $peso = 10; $i < 9; $i++, $peso--) {
        $soma += $cpf[$i] * $peso;
    }
    $resto = $soma % 11;
    $cpf[9] = ($resto < 2) ? 0 : 11 - $resto;

    $soma = 0;
    for ($i = 0, $peso = 11; $i < 10; $i++, $peso--) {
        $soma += $cpf[$i] * $peso;
    }
    $resto = $soma % 11;
    $cpf[10] = ($resto < 2) ? 0 : 11 - $resto;

    $cpfString = implode('', $cpf);
    return preg_replace("/^(\d{3})(\d{3})(\d{3})(\d{2})$/", "$1.$2.$3-$4", $cpfString);
}
