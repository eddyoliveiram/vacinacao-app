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
                    <!-- O valor inicial é definido no x-data e vinculado via x-model -->
                    <input type="text" id="login" name="login" x-model="login"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span x-show="errors.login" class="text-red-500 text-sm mt-1" x-text="errors.login"></span>
                </div>
                <div class="mb-6">
                    <label for="senha" class="block text-gray-700 text-sm font-bold mb-2">Senha</label>
                    <div class="relative">
                        <input :type="showPassword ? 'text' : 'password'" id="senha" name="senha" x-model="senha"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button type="button" @click="togglePasswordVisibility()"
                                class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-700 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path x-show="!showPassword" stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path x-show="!showPassword" stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path x-show="showPassword" stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
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

    <script>
        function loginHandler() {
            return {
                login: 'admin', // Valor inicial para o campo de login
                senha: 'admin', // Valor inicial para o campo de senha
                showPassword: false,
                errors: {
                    login: '',
                    senha: ''
                },
                togglePasswordVisibility() {
                    this.showPassword = !this.showPassword;
                },
                validateLogin() {
                    this.errors = { login: '', senha: '' }; // Reset errors
                    if (this.login === '') {
                        this.errors.login = 'O login é obrigatório.';
                    }
                    if (this.senha === '') {
                        this.errors.senha = 'A senha é obrigatória.';
                    }
                    if (!this.errors.login && !this.errors.senha) {
                        window.location.href = '/dashboard';
                    }
                }
            }
        }
    </script>
@endsection
