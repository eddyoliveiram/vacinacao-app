@extends('layouts.auth')

@section('title', 'Login - Controle de Vacinação')

@section('content')
    <div class="flex items-center justify-center min-h-screen" x-data="loginHandler()">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-sm">
            <h2 class="text-2xl font-bold text-center mb-1">Controle de Vacinação</h2>
            <p class="text-center text-gray-600 mb-6">Entre com suas credenciais de acesso.</p>
            <form @submit.prevent="validateLogin">
                <div class="mb-4">
                    <label for="login" class="block text-gray-700 text-sm font-bold mb-2">Login</label>
                    <input type="text" id="login" name="login" x-model="login"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                           x-init="login = 'admin'">
                    <span x-show="errors.login" class="text-red-500 text-sm mt-1" x-text="errors.login"></span>
                </div>
                <div class="mb-6">
                    <label for="senha" class="block text-gray-700 text-sm font-bold mb-2">Senha</label>
                    <div class="relative">
                        <input :type="showPassword ? 'text' : 'password'" id="senha" name="senha" x-model="senha"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                               x-init="senha = 'admin'">
                        <button type="button" @click="togglePasswordVisibility()"
                                class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-700 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5c3.037 0 5.693 1.667 7.029 4.125M12 19.5c-3.037 0-5.693-1.667-7.029-4.125M3 3l18 18"/>
                            </svg>
                        </button>
                    </div>
                    <span x-show="errors.senha" class="text-red-500 text-sm mt-1" x-text="errors.senha"></span>
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-600">
                    Entrar
                </button>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/auth/login.js') }}"></script>
@endsection
