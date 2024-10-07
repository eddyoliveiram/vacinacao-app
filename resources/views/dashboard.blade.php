{{-- dashboard.blade.php --}}
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2 class="text-2xl font-semibold mb-6">Bem-vindo.</h2>

    <section id="funcionarios" class="mb-8">
        <h3 class="text-xl font-semibold mb-4">Funcionários</h3>
        <div class="bg-white shadow rounded-lg p-4">
            <p class="text-gray-600">Lista de funcionários e suas informações de vacinação.</p>
            <table class="w-full mt-4">
                <thead>
                <tr class="bg-gray-100">
                    <th class="text-left p-2">Nome</th>
                    <th class="text-left p-2">CPF</th>
                    <th class="text-left p-2">Status de Vacinação</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="p-2">João Silva</td>
                    <td class="p-2">123.456.789-00</td>
                    <td class="p-2">Completo</td>
                </tr>
                <tr class="bg-gray-50">
                    <td class="p-2">Maria Santos</td>
                    <td class="p-2">123.456.789-00</td>
                    <td class="p-2">Parcial</td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>

    <section id="controle">
        <h3 class="text-xl font-semibold mb-4">Controle de Vacinação</h3>
        <div class="bg-white shadow rounded-lg p-4">
            <p class="text-gray-600">Estatísticas e gráficos sobre o progresso da vacinação na empresa.</p>
            <div class="mt-4">
                <h4 class="font-semibold mb-2">Progresso de Vacinação</h4>
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: 75%"></div>
                </div>
                <p class="text-sm text-gray-600 mt-2">75% dos funcionários completamente vacinados</p>
            </div>
            <div class="mt-4">
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                    <div class="bg-red-600 h-2.5 rounded-full" style="width: 25%"></div>
                </div>
                <p class="text-sm text-gray-600 mt-2">25% dos funcionários não vacinados</p>
            </div>
        </div>
    </section>
@endsection
