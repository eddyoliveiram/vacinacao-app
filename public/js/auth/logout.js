
function confirmLogout() {
    const token = localStorage.getItem('access_token');

    if (!token) {
        window.location.href = "/";
        return;
    }

    Swal.fire({
        text: "Deseja realmente sair do sistema?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, desejo!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
        axios.post('/api/logout', {}, {
        headers: {
        'Authorization': 'Bearer ' + token
    }
    })
    .then(() => {
    localStorage.removeItem('access_token');
    window.location.href = "/";
})
    .catch(error => {
    console.error('Erro ao fazer logout:', error);
});
}
});
}

    document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobileMenu');
    const closeMenu = document.getElementById('close-menu');

    menuToggle.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
});

    closeMenu.addEventListener('click', () => {
    mobileMenu.classList.add('hidden');
});

    document.querySelectorAll('#mobileMenu a').forEach(link => {
    link.addEventListener('click', () => {
    mobileMenu.classList.add('hidden');
});
});
});

