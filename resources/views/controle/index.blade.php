{{-- controle.blade.php --}}
@extends('layouts.app')

@section('title', 'Controle de Vacinação')

@section('content')
    <h2 class="text-2xl font-semibold mb-6">Controle de Vacinação</h2>

    <div class="container mx-auto">

        <div class="flex items-center mb-6">
            <div class="flex-grow">
                <input type="text" name="search" placeholder="Pesquisar por nome ou cpf"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button class="ml-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 flex-shrink-0">
                <i class="fas fa-search"></i> Pesquisar
            </button>
        </div>

        <div class="bg-white shadow-md rounded p-6 mb-6">
            <h3 class="text-xl font-bold mb-2">Funcionário: João Silva</h3>
            <p class="text-gray-600">CPF: 111.111.111-11</p>

            <div class="flex  mt-4">
                <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    <i class="fas fa-plus-circle"></i> Adicionar Vacina
                </button>
            </div>

            <div class="overflow-x-auto mt-4">
                <table class="min-w-full table-auto border-collapse">
                    <thead>
                    <tr class="bg-blue-500 text-white">
                        <th class="px-4 py-2 text-left font-semibold">Vacina</th>
                        <th class="px-4 py-2 text-left font-semibold">Data</th>
                        <th class="px-4 py-2 text-left font-semibold">Lote</th>
                        <th class="px-4 py-2 text-left font-semibold text-center">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="border-b">
                        <td class="px-4 py-2">Covid-19</td>
                        <td class="px-4 py-2">12/01/2024</td>
                        <td class="px-4 py-2">12345</td>
                        <td class="px-4 py-2 text-center">
                            <button class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 mr-2">
                                <i class="fas fa-edit"></i> Editar
                            </button>
                            <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">
                                <i class="fas fa-trash-alt"></i> Excluir
                            </button>
                        </td>
                    </tr>
                    <tr class="border-b bg-gray-50">
                        <td class="px-4 py-2">Gripe</td>
                        <td class="px-4 py-2">05/07/2023</td>
                        <td class="px-4 py-2">98765</td>
                        <td class="px-4 py-2 text-center">
                            <button class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 mr-2">
                                <i class="fas fa-edit"></i> Editar
                            </button>
                            <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">
                                <i class="fas fa-trash-alt"></i> Excluir
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
