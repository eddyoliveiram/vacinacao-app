<?php

namespace App\Jobs;

use App\Models\Funcionario;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GerarRelatorioNaoVacinados implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $naoVacinados = Funcionario::whereDoesntHave('vacinas')->get();

        $csvData = "Nome Completo,CPF\n";

        foreach ($naoVacinados as $funcionario) {
            $csvData .= "{$funcionario->nome_completo},{$funcionario->cpf}\n";
        }

        if (!Storage::exists('relatorios')) {
            Storage::makeDirectory('relatorios');
        }

        $filename = 'relatorios/nao_vacinados_' . now()->format('Y_m_d_H_i_s') . '.csv';
        Storage::put($filename, $csvData);

        Log::info("Report saved to {$filename}");
    }

}
