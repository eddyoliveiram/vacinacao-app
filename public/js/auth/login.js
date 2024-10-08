function loginHandler() {
    return {
        login: '',
        senha: '',
        showPassword: false,
        errors: {
            login: '',
            senha: ''
        },
        togglePasswordVisibility() {
            this.showPassword = !this.showPassword;
        },
        validateLogin() {
            this.errors = { login: '', senha: '' };
            if (this.login === '') {
                this.errors.login = 'O login é obrigatório.';
            }
            if (this.senha === '') {
                this.errors.senha = 'A senha é obrigatória.';
            }
            if (!this.errors.login && !this.errors.senha) {
                axios.post('/api/login', {
                    login: this.login,
                    password: this.senha
                })
                    .then(response => {
                        localStorage.setItem('access_token', response.data.access_token);
                        window.location.href = '/dashboard';
                    })
                    .catch(error => {
                        if (error.response && error.response.status === 401) {
                            this.errors.login = 'Credenciais inválidas.';
                        } else {
                            console.error('Erro na requisição:', error);
                        }
                    });
            }
        },
        checkIfLoggedIn() {
            const token = localStorage.getItem('access_token');
            if (token) {
                window.location.href = '/dashboard';
            }
        }
    }
}


document.addEventListener('DOMContentLoaded', function () {
    const handler = loginHandler();
    handler.checkIfLoggedIn();
});
