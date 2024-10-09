@extends('layouts.app')

@section('title', 'Controle de Vacinação')

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

    <h2 class="text-2xl font-semibold mb-6">Controle de Vacinação</h2>

    <div class="container mx-auto">

        <!-- Formulário de busca -->
        <form method="GET" action="{{ route('controles.index') }}">
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

        <div class="space-y-6">
            @foreach ($funcionarios as $funcionario)
                <div class="bg-white shadow-md rounded p-6">
                    <h3 class="text-xl font-bold mb-2">{{ $funcionario->nome_completo }}</h3>
                    <p class="mb-6"><strong>CPF:</strong> {{ $funcionario->cpf }}</p>


                    @if($funcionario->vacinas->isNotEmpty())
                        <div class="overflow-x-auto">
                            <table class="min-w-full border-collapse">
                                <thead>
                                <tr class="hover:bg-gray-100">
                                    <th class="px-4 py-2 text-left font-semibold">Dose</th>
                                    <th class="px-4 py-2 text-left font-semibold">Vacina</th>
                                    <th class="px-4 py-2 text-left font-semibold">Lote</th>
                                    <th class="px-4 py-2 text-left font-semibold">Data de Aplicação</th>
                                    <th class="px-4 py-2 text-left font-semibold text-center">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($funcionario->vacinas as $vacina)
                                    <tr class="border-b hover:bg-gray-100">
                                        <td class="px-4 py-2">{{ $vacina->pivot->dose . 'º' }}</td>
                                        <td class="px-4 py-2">{{ $vacina->nome }}</td>
                                        <td class="px-4 py-2">{{ $vacina->lote }}</td>
                                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($vacina->pivot->data_aplicacao)->format('d/m/Y') }}</td>
                                        <td class="px-4 py-2 text-center">
                                            <a href="{{ route('controles.edit', $vacina->pivot->id) }}" class="text-blue-600 hover:text-blue-800 text-lg mr-4">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('controles.destroy', $vacina->pivot->id) }}" method="POST" id="delete-form-{{ $vacina->pivot->id }}" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="confirmDelete({{ $vacina->pivot->id }})" class="text-red-600 hover:text-red-800 text-lg">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>

                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-gray-500">Nenhuma vacina registrada para este funcionário.</p>
                    @endif

                    <div class="flex justify-start mt-4">
                        <a href="{{ route('controles.vacina', ['funcionario' => $funcionario->id]) }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                            <i class="fas fa-plus-circle"></i> Adicionar Vacina
                        </a>
                    </div>
                </div>
            @endforeach

        </div>



        <div class="mt-6">
            {{ $funcionarios->appends(request()->query())->links() }}
        </div>
    </div>
@endsection

<script>
    function confirmDelete(controleId) {
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
                document.getElementById('delete-form-' + controleId).submit();
            }
        });
    }
</script>
