<?php

namespace App\Http\Controllers;

use App\Jobs\GerarRelatorioNaoVacinados;
use App\Models\Funcionario;
use App\Models\Vacina;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalFuncionarios = Funcionario::count();

        $vacinados = Funcionario::whereHas('vacinas')->count();

        $naoVacinados = Funcionario::whereDoesntHave('vacinas')->count();

        $porcentagemVacinados = $totalFuncionarios > 0 ? ($vacinados / $totalFuncionarios) * 100 : 0;
        $porcentagemNaoVacinados = $totalFuncionarios > 0 ? ($naoVacinados / $totalFuncionarios) * 100 : 0;

        $vacinas = Vacina::where('data_validade', '>=', now())->get();

        return view('dashboard.index', compact('porcentagemVacinados', 'porcentagemNaoVacinados', 'vacinas'));
    }

    public function gerarRelatorioNaoVacinados()
    {
        dispatch(new GerarRelatorioNaoVacinados());
        return redirect()->back()->with('status', 'A geração do relatório foi iniciada. Você será notificado quando estiver pronto.');
    }
}
