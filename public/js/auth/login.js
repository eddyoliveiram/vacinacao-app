const togglePasswordVisibility = document.querySelector('#togglePasswordVisibility');
const passwordInput = document.querySelector('#password');
const eyeIcon = document.querySelector('#eyeIcon');

togglePasswordVisibility.addEventListener('click', function () {
    const isPassword = passwordInput.type === 'password';
    passwordInput.type = isPassword ? 'text' : 'password';

    // Atualizar o texto do botão para indicar o estado
    eyeIcon.textContent = isPassword ? 'Ocultar' : 'Mostrar';
});
