@extends('layouts.auth')

@section('title', 'Login - Controle de Vacinação')

@section('content')
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-sm">
            <h2 class="text-2xl font-bold text-center mb-1">Controle de Vacinação</h2>
            <p class="text-center text-gray-600 mb-6">Entre com suas credenciais de acesso.</p>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label for="login" class="block text-gray-700 text-sm font-bold mb-2">Login</label>
                    <input required type="text" id="login" name="login" value="{{ old('login') ?? 'admin' }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('login')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Senha</label>
                    <div class="relative">
                        <input required type="password" id="password" name="password" value="admin"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button type="button" id="togglePasswordVisibility" class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                            <!-- Use um ícone simples ou texto para testar -->
                            <span id="eyeIcon">Mostrar</span>
                        </button>
                    </div>
                    @error('password')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-600">
                    <i class="fas fa-sign-in-alt"></i> Entrar
                </button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/auth/login.js') }}"></script>
@endsection
