@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2 class="text-2xl font-semibold mb-6">Bem-vindo.</h2>

    <section id="controle">
        <h3 class="text-xl font-semibold mb-4">Controle de Vacinação</h3>
        <div class="bg-white shadow rounded-lg p-4">
            <div>
                <h4 class="font-semibold mb-2">Progresso de Vacinação</h4>
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                    <div class="bg-green-600 h-2.5 rounded-full" style="width: {{ $porcentagemVacinados }}%"></div>
                </div>
                <p class="text-sm text-gray-600 mt-2">{{ number_format($porcentagemVacinados, 2) }}% dos funcionários vacinados</p>
            </div>
            <div class="mt-4">
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                    <div class="bg-red-600 h-2.5 rounded-full" style="width: {{ $porcentagemNaoVacinados }}%"></div>
                </div>
                <p class="text-sm text-gray-600 mt-2">{{ number_format($porcentagemNaoVacinados, 2) }}% dos funcionários não vacinados</p>
            </div>
            <form action="{{ route('dashboard.gerarRelatorioNaoVacinados') }}" method="POST" class="mt-6">
                @csrf
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">
                    <i class="fas fa-file"></i> Gerar Relatório de Não Vacinados
                </button>
            </form>
        </div>

        <!-- Relatórios gerados -->
        <section id="relatorios" class="mt-4">
            <div class="bg-white shadow rounded-lg p-4">
                <p class="font-semibold mb-2">Relatórios Gerados</p>
                <div class="mt-4">
                    @if($relatorios->isEmpty())
                        <p class="text-gray-500">Nenhum relatório gerado até agora.</p>
                    @else
                        <table class="min-w-full bg-white">
                            <thead>
                            <tr>
                                <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-semibold text-gray-700">Nome do Relatório</th>
                                <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-semibold text-gray-700">Data de Geração</th>
                                <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-semibold text-gray-700">Status</th>
                                <th class="py-2 px-4 border-b border-gray-200 text-center text-sm font-semibold text-gray-700">Ação</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($relatorios as $relatorio)
                                <tr class="hover:bg-gray-100">
                                    <td class="py-2 px-4 border-b border-gray-200">{{ $relatorio->nome }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200">{{ $relatorio->created_at->format('d/m/Y H:i:s') }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200">{{ $relatorio->status }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200 text-center">
                                        @if($relatorio->status == 'concluido' && $relatorio->caminho)
                                            <a href="{{ route('dashboard.downloadRelatorio', $relatorio->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                                <i class="fas fa-download"></i> Baixar
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </section>
    </section>

    @if(session('status'))
        <script>
            Swal.fire({
                title: 'Sucesso!',
                text: '{{ session('status') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
@endsection
