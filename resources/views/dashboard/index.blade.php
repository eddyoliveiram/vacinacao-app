@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2 class="text-2xl font-semibold mb-6">Bem-vindo.</h2>

    <section id="controle" >
        <h3 class="text-xl font-semibold mb-4">Controle de Vacinação</h3>
        <div class="bg-white shadow rounded-lg p-4">
            <p class="text-gray-600">Estatísticas sobre o progresso da vacinação na empresa.</p>
            <div class="mt-4">
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
        </div>
    </section>



    <form action="{{ route('dashboard.gerarRelatorioNaoVacinados') }}" method="POST" class="mt-6">
        @csrf
        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">
            <i class="fas fa-file"></i> Gerar Relatório de Não Vacinados
        </button>
    </form>

    @if (session('status'))
        <div class="mt-4 bg-green-200 text-green-800 p-4 rounded-md">
            {{ session('status') }}
        </div>
    @endif
@endsection
