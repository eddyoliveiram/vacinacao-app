@extends('layouts.app')

@section('title', 'Vacinas')

@section('content')
    @if(session('success'))
        <script>
            Swal.fire({
                title: 'Sucesso!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <h2 class="text-2xl font-semibold mb-6">Vacinas</h2>

    <div class="container mx-auto">

        <form method="GET" action="{{ route('vacinas.index') }}">
            <div class="flex items-center mb-6">
                <div class="flex-grow">
                    <input type="text" name="search" placeholder="Pesquisar por nome ou lote"
                           value="{{ request('search') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <button type="submit" class="ml-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 flex-shrink-0">
                    <i class="fas fa-search"></i> Pesquisar
                </button>
            </div>
        </form>

        <div class="flex mb-4">
            <a href="{{ route('vacinas.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                <i class="fas fa-plus-circle"></i> Adicionar Vacina
            </a>
        </div>

        <div class="overflow-x-auto mt-4">
            <table class="min-w-full table-auto border-collapse bg-white">
                <thead>
                <tr class="bg-blue-500 text-white">
                    <th class="px-4 py-2 text-left font-semibold">Nome</th>
                    <th class="px-4 py-2 text-left font-semibold">Lote</th>
                    <th class="px-4 py-2 text-left font-semibold">Data de Validade</th>
                    <th class="px-4 py-2 text-center font-semibold" style="width: 20%">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($vacinas as $vacina)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $vacina->nome }}</td>
                        <td class="px-4 py-2">{{ $vacina->lote }}</td>
                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($vacina->data_validade)->format('d/m/Y') }}</td>
                        <td class="px-4 py-2 text-center">
                            <button onclick="window.location.href='{{ route('vacinas.edit', $vacina->id) }}'" class="text-blue-600 hover:text-blue-800 mr-4 text-lg">
                                <i class="fas fa-edit"></i>
                            </button>

                            <form action="{{ route('vacinas.destroy', $vacina->id) }}" method="POST" class="inline-block" id="delete-form-{{ $vacina->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete({{ $vacina->id }})" class="text-red-600 hover:text-red-800 text-lg">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <h2 class="text-xl font-semibold mb-6 mt-4 text-center"><text class="text-red-600">(Query cacheada por 10s)</text></h2>
        </div>

        <div class="mt-4">
            {{ $vacinas->links() }}
        </div>
    </div>

@endsection

<script src="{{ asset('js/vacinas/confirmDelete.js') }}"></script>
