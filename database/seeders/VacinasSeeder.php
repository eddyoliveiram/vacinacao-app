<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vacina;

class VacinasSeeder extends Seeder
{
    public function run()
    {
        Vacina::create([
            'nome' => 'Coronavac',
            'lote' => 'L12345',
            'data_validade' => '2025-01-03'
        ]);

        Vacina::create([
            'nome' => 'Pfizer',
            'lote' => 'L67890',
            'data_validade' => '2025-12-01'
        ]);

        Vacina::create([
            'nome' => 'Astrazeneca',
            'lote' => 'L98887',
            'data_validade' => '2025-06-30'
        ]);

        Vacina::create([
            'nome' => 'Sinovac',
            'lote' => 'L11132',
            'data_validade' => '2025-02-22'
        ]);

        Vacina::create([
            'nome' => 'Janssen',
            'lote' => 'L12666',
            'data_validade' => '2025-06-15'
        ]);
    }
}
