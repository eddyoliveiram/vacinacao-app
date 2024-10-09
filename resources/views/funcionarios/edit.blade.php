{{-- resources/views/funcionarios/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Editar Funcionário')

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

    <h2 class="text-2xl font-semibold mb-6">Editar Funcionário</h2>

    <form method="POST" action="{{ route('funcionarios.update', $funcionario->id) }}" x-data>
        @csrf
        @method('PUT')  <!-- Necessário para enviar a requisição como PUT -->

        <div class="mb-4">
            <label for="cpf" class="block text-gray-700 text-sm font-bold mb-2">CPF</label>
            <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" x-mask="999.999.999-99" value="{{ old('cpf', $funcionario->cpf) }}"  required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('cpf')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="nome_completo" class="block text-gray-700 text-sm font-bold mb-2">Nome Completo</label>
            <input type="text" id="nome_completo" name="nome_completo" value="{{ old('nome_completo', $funcionario->nome_completo) }}" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('nome_completo')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="data_nascimento" class="block text-gray-700 text-sm font-bold mb-2">Data de Nascimento</label>
            <input type="date" id="data_nascimento" name="data_nascimento" value="{{ old('data_nascimento', $funcionario->data_nascimento) }}" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('data_nascimento')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="comorbidade" class="block text-gray-700 text-sm font-bold mb-2">Portador de Comorbidade?</label>
            <select id="comorbidade" name="comorbidade" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="0" {{ old('comorbidade', $funcionario->comorbidade) == 0 ? 'selected' : '' }}>Não</option>
                <option value="1" {{ old('comorbidade', $funcionario->comorbidade) == 1 ? 'selected' : '' }}>Sim</option>
            </select>
            @error('comorbidade')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex justify-end">
            <a href="{{ route('funcionarios.index') }}" class="mr-4 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancelar</a>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Salvar</button>
        </div>
    </form>
@endsection
