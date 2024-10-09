@extends('layouts.app')

@section('title', 'Editar Vacina')

@section('content')
    @if($errors->any())
        <div class="bg-red-100 text-red-700 px-4 py-2 rounded-md mb-6">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h2 class="text-2xl font-semibold mb-6">Editar Vacina de {{ $funcionario->nome_completo }}</h2>

    <div class="container mx-auto">
        <form method="POST" action="{{ route('controles.update', $controle->id) }}">
            @csrf
            @method('PUT')

            <input type="hidden" name="id_funcionario" value="{{ $funcionario->id }}">

            <div class="mb-4">
                <label for="dose" class="block text-gray-700 text-sm font-bold mb-2">Dose</label>
                <select id="dose" name="dose" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                    <option value="">{{'- Selecione -'}}</option>
                    <option value="1" {{ $controle->dose == '1' ? 'selected' : '' }}>{{'1º Dose'}}</option>
                    <option value="2" {{ $controle->dose == '2' ? 'selected' : '' }}>{{'2º Dose'}}</option>
                    <option value="3" {{ $controle->dose == '3' ? 'selected' : '' }}>{{'3º Dose'}}</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="id_vacina" class="block text-gray-700 text-sm font-bold mb-2">Vacina</label>
                <select id="id_vacina" name="id_vacina" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                    <option value="">{{'- Selecione -'}}</option>
                    @foreach($vacinas as $vacina)
                        <option value="{{ $vacina->id }}" {{ $controle->id_vacina == $vacina->id ? 'selected' : '' }}>{{ $vacina->nome.' ('.$vacina->lote.')' }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="data_aplicacao" class="block text-gray-700 text-sm font-bold mb-2">Data de Aplicação</label>
                <input type="date" id="data_aplicacao" name="data_aplicacao" value="{{ $controle->data_aplicacao }}" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex justify-end">
                <a href="{{ route('controles.index') }}" class="mr-4 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancelar</a>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Salvar</button>
            </div>
        </form>
    </div>
@endsection
