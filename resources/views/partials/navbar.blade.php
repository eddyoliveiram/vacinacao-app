{{-- partials/navbar.blade.php --}}
<nav class="bg-blue-600 text-white">
    <div class="flex items-center justify-between p-4">
        <h1 class="text-xl font-bold">Vacinação App</h1>
        <button id="menuToggle" class="md:hidden text-white focus:outline-none">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </div>
    <ul id="mobileMenu" class="hidden px-2 pb-3 space-y-1 md:flex md:flex-row md:space-x-4 md:space-y-0">
        <li>
            <a href="#funcionarios" class="block py-2 px-4 hover:bg-blue-700 transition duration-200">Funcionários</a>
        </li>
        <li>
            <a href="#vacinas" class="block py-2 px-4 hover:bg-blue-700 transition duration-200">Vacinas</a>
        </li>
        <li>
            <a href="#controle" class="block py-2 px-4 hover:bg-blue-700 transition duration-200">Controle de Vacinação</a>
        </li>
    </ul>
</nav>
