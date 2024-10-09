<?php

namespace App\Http\Controllers;

use App\Jobs\GerarRelatorioJob;
use App\Models\Funcionario;
use App\Models\Relatorio;
use App\Services\Relatorios\RelatorioNaoVacinados;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $totalFuncionarios = Funcionario::count();
        $vacinados = Funcionario::whereHas('vacinas')->count();
        $naoVacinados = Funcionario::whereDoesntHave('vacinas')->count();

        $relatorios = Relatorio::orderBy('created_at', 'desc')->paginate(10);

        $porcentagemVacinados = $totalFuncionarios > 0 ? ($vacinados / $totalFuncionarios) * 100 : 0;
        $porcentagemNaoVacinados = $totalFuncionarios > 0 ? ($naoVacinados / $totalFuncionarios) * 100 : 0;

        return view('dashboard.index', compact('porcentagemVacinados', 'porcentagemNaoVacinados', 'relatorios'));
    }

    public function gerarRelatorioNaoVacinados()
    {
        $relatorio = Relatorio::create([
            'nome' => 'Relatório de Não Vacinados',
            'status' => 'processando',
        ]);

        $relatorioService = new RelatorioNaoVacinados();
        dispatch(new GerarRelatorioJob($relatorio, $relatorioService));

        return redirect()->back()->with('status', 'A geração do relatório foi iniciada. Você será notificado quando estiver pronto.');
    }

    public function downloadRelatorio(Relatorio $relatorio)
    {
        if ($relatorio->status == 'concluido' && Storage::exists($relatorio->caminho)) {
            return Storage::download($relatorio->caminho);
        }

        return redirect()->back()->with('status', 'Relatório ainda não está pronto para download.');
    }
}
