<?php

namespace App\Jobs;

use App\Models\Relatorio;
use App\Services\Relatorios\RelatorioInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GerarRelatorioJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $relatorio;
    protected $relatorioService;

    /**
     * Create a new job instance.
     *
     * @param Relatorio $relatorio
     * @param RelatorioInterface $relatorioService
     */
    public function __construct(Relatorio $relatorio, RelatorioInterface $relatorioService)
    {
        $this->relatorio = $relatorio;
        $this->relatorioService = $relatorioService;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        sleep(4);

        $csvData = $this->relatorioService->gerarConteudo();
        $filename = $this->relatorioService->getFilename();

        if (!Storage::exists('relatorios')) {
            Storage::makeDirectory('relatorios');
        }

        Storage::put($filename, $csvData);

        $this->relatorio->update([
            'caminho' => $filename,
            'status' => 'concluido',
        ]);

        Log::info("Report saved to {$filename}");
    }
}
