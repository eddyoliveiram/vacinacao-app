{{-- vacinas/edit.blade.php --}}
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

    <h2 class="text-2xl font-semibold mb-6">Editar Vacina</h2>

    <form method="POST" action="{{ route('vacinas.update', $vacina->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nome" class="block text-gray-700 text-sm font-bold mb-2">Nome</label>
            <input type="text" id="nome" name="nome" value="{{ old('nome', $vacina->nome) }}" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('nome')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="lote" class="block text-gray-700 text-sm font-bold mb-2">Lote</label>
            <input type="text" id="lote" name="lote" value="{{ old('lote', $vacina->lote) }}" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('lote')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="data_validade" class="block text-gray-700 text-sm font-bold mb-2">Data de Validade</label>
            <input type="date" id="data_validade" name="data_validade" value="{{ old('data_validade', $vacina->data_validade) }}" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('data_validade')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex justify-end">
            <a href="{{ route('vacinas.index') }}" class="mr-4 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancelar</a>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Salvar Alterações</button>
        </div>
    </form>
@endsection
