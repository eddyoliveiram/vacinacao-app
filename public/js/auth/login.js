document.addEventListener('DOMContentLoaded', function () {
    const togglePasswordVisibility = document.querySelector('#togglePasswordVisibility');
    const passwordInput = document.querySelector('#password');

    togglePasswordVisibility.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
    });
});
