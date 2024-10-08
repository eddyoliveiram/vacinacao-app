@extends('layouts.app')

@section('title', 'Funcionários')

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

    <h2 class="text-2xl font-semibold mb-6">Funcionários</h2>

    <div class="container mx-auto">

        <form method="GET" action="{{ route('funcionarios.index') }}">
            <div class="flex items-center mb-6">
                <div class="flex-grow">
                    <input type="text" name="search" placeholder="Pesquisar por nome ou CPF"
                           value="{{ request('search') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <button type="submit" class="ml-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 flex-shrink-0">
                    <i class="fas fa-search"></i> Pesquisar
                </button>
            </div>
        </form>

        <div class="flex mb-4">
            <a href="{{ route('funcionarios.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                <i class="fas fa-plus-circle"></i> Adicionar Funcionário
            </a>
        </div>

        <div class="overflow-x-auto mt-4">
            <table class="min-w-full table-auto border-collapse bg-white">
                <thead>
                <tr class="bg-blue-500 text-white">
                    <th class="px-4 py-2 text-left font-semibold">CPF</th>
                    <th class="px-4 py-2 text-left font-semibold">Nome</th>
                    <th class="px-4 py-2 text-left font-semibold">Data de Nascimento</th>
                    <th class="px-4 py-2 text-left font-semibold">Comorbidade</th>
                    <th class="px-4 py-2 text-left font-semibold text-center" style="width: 20%">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($funcionarios as $funcionario)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $funcionario->cpf }}</td>
                        <td class="px-4 py-2">{{ $funcionario->nome_completo }}</td>
                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($funcionario->data_nascimento)->format('d/m/Y') }}</td>
                        <td class="px-4 py-2">{{ $funcionario->comorbidade === true ? 'Sim' : 'Não' }}</td>
                        <td class="px-4 py-2 text-center">
                            <!-- Botão de editar -->
                            <button onclick="window.location.href='{{ route('funcionarios.edit', $funcionario->id) }}'" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 mr-2">
                                <i class="fas fa-edit"></i>
                            </button>

                            <!-- Botão de excluir -->
                            <form action="{{ route('funcionarios.destroy', $funcionario->id) }}" method="POST" class="inline-block" id="delete-form-{{ $funcionario->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete({{ $funcionario->id }})" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $funcionarios->links() }}
        </div>
    </div>

    @include('partials.funcionario-modal')

@endsection

<script>

    function confirmDelete(funcionarioId) {
        Swal.fire({
            title: 'Tem certeza?',
            text: "Você não poderá reverter esta ação!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + funcionarioId).submit();
            }
        });
    }
</script>
