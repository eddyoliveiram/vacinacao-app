{{-- funcionarios.blade.php --}}
@extends('layouts.app')

@section('title', 'Funcionários')

@section('content')
    <h2 class="text-2xl font-semibold mb-6">Funcionários</h2>

    <div class="container mx-auto">

        <div class="flex items-center mb-6">
            <div class="flex-grow">
                <input type="text" name="search" placeholder="Pesquisar por nome ou CPF"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button class="ml-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 flex-shrink-0">
                <i class="fas fa-search"></i> Pesquisar
            </button>
        </div>

        <div class="flex mb-4">
            <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700"
                    onclick="abrirModalFuncionario('adicionar')">
                <i class="fas fa-plus-circle"></i> Adicionar Funcionário
            </button>
        </div>

        <div class="overflow-x-auto mt-4">
            <table class="min-w-full table-auto border-collapse bg-white">
                <thead>
                    <tr class="bg-blue-500 text-white">
                        <th class="px-4 py-2 text-left font-semibold">CPF</th>
                        <th class="px-4 py-2 text-left font-semibold">Nome</th>
                        <th class="px-4 py-2 text-left font-semibold">Data de Nascimento</th>
                        <th class="px-4 py-2 text-left font-semibold">Comorbidade</th>
                        <th class="px-4 py-2 text-left font-semibold text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                <tr class="border-b">
                    <td class="px-4 py-2">{{ '123313' }}</td>
                    <td class="px-4 py-2">{{ 'Eddy' }}</td>
                    <td class="px-4 py-2">{{ '11/10/2001' }}</td>
                    <td class="px-4 py-2">{{ 'Sim' }}</td>
                    <td class="px-4 py-2 text-center">
                        <button class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 mr-2"
                                onclick="abrirModalFuncionario('editar', '{{ '1' }}')">
                            <i class="fas fa-edit"></i> Editar
                        </button>
                        <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600"
                                onclick="confirmarExcluir('{{ '1'}}')">
                            <i class="fas fa-trash-alt"></i> Excluir
                        </button>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2">{{ '123313' }}</td>
                    <td class="px-4 py-2">{{ 'Eddy' }}</td>
                    <td class="px-4 py-2">{{ '11/10/2001' }}</td>
                    <td class="px-4 py-2">{{ 'Sim' }}</td>
                    <td class="px-4 py-2 text-center">
                        <button class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 mr-2"
                                onclick="abrirModalFuncionario('editar', '{{ '1' }}')">
                            <i class="fas fa-edit"></i> Editar
                        </button>
                        <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600"
                                onclick="confirmarExcluir('{{ '1'}}')">
                            <i class="fas fa-trash-alt"></i> Excluir
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    @include('partials.funcionario-modal')

@endsection
