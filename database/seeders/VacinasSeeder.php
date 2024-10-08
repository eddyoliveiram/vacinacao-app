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
            'data_validade' => '2025-01-01'
        ]);

        Vacina::create([
            'nome' => 'Pfizer',
            'lote' => 'L67890',
            'data_validade' => '2024-06-15'
        ]);
    }
}
