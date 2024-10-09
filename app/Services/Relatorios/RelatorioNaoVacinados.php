<?php
namespace App\Services\Relatorios;

use App\Models\Funcionario;

class RelatorioNaoVacinados implements RelatorioInterface
{
    public function gerarConteudo(): string
    {
        $naoVacinados = Funcionario::whereDoesntHave('vacinas')->get();
        $csvData = "Nome Completo;CPF\n";

        foreach ($naoVacinados as $funcionario) {
            $csvData .= "{$funcionario->nome_completo};{$funcionario->cpf}\n";
        }

        return $csvData;
    }

    public function getFilename(): string
    {
        return 'relatorios/nao_vacinados_'.now()->format('Y_m_d_H_i_s').'.csv';
    }
}
