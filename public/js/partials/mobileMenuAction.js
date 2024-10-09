
document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobileMenu');
    const closeMenu = document.getElementById('close-menu');

    menuToggle.addEventListener('click', function () {
        mobileMenu.classList.remove('hidden');
    });

    closeMenu.addEventListener('click', function () {
        mobileMenu.classList.add('hidden');
    });

    mobileMenu.addEventListener('click', function (e) {
        if (e.target === mobileMenu) {
            mobileMenu.classList.add('hidden');
        }
    });
});
