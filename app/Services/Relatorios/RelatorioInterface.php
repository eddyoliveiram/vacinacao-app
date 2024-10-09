<?php

namespace App\Services\Relatorios;

interface RelatorioInterface
{
    /**
     * Gera o conteúdo do relatório.
     *
     * @return string
     */
    public function gerarConteudo(): string;

    /**
     * Retorna o nome do arquivo para o relatório.
     *
     * @return string
     */
    public function getFilename(): string;
}
