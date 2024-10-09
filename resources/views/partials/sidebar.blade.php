<div class="flex h-screen">
    <!-- Sidebar para desktop -->
    <div class="w-64 bg-blue-800 text-white hidden md:block">
        <div class="p-4">
            <h2 class="text-2xl font-semibold mb-4">Vacinação App</h2>
            <ul>
                <li>
                    <a href="{{ route('dashboard.index') }}" class="hover:bg-blue-700 p-2 block text-white">
                        <i class="fas fa-chart-line mr-2"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('controles.index') }}" class="hover:bg-blue-700 p-2 block text-white">
                        <i class="fas fa-clipboard-list mr-2"></i> Controle de Vacinação
                    </a>
                </li>
                <li>
                    <a href="{{ route('funcionarios.index') }}" class="hover:bg-blue-700 p-2 block text-white">
                        <i class="fas fa-users mr-2"></i> Funcionários
                    </a>
                </li>
                <li>
                    <a href="{{ route('vacinas.index') }}" class="hover:bg-blue-700 p-2 block text-white">
                        <i class="fas fa-syringe mr-2"></i> Vacinas
                    </a>
                </li>
                <li>
                    <a href="#" onclick="confirmLogout()" class="hover:bg-blue-700 p-2 block text-white">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="flex-1 bg-gray-100 py-2 px-2">
        <button class="md:hidden text-white bg-blue-500 p-2 rounded" id="menu-toggle">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
    </div>

    <!-- Sidebar mobile -->
    <div class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden" id="mobileMenu">
        <div class="w-64 bg-blue-800 h-full" id="mobile-sidebar">
            <div class="p-4">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-semibold mb-4 mt-3 text-white">Vacinação App</h2>
                    <button id="close-menu" class="bg-white  p-2 rounded text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
                <ul class="mt-4">
                    <li>
                        <a href="{{ route('dashboard.index') }}" class="hover:bg-blue-700 p-2 block text-white">
                            <i class="fas fa-chart-line mr-2"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('controles.index') }}" class="hover:bg-blue-700 p-2 block text-white">
                            <i class="fas fa-clipboard-list mr-2"></i> Controle de Vacinação
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('funcionarios.index') }}" class="hover:bg-blue-700 p-2 block text-white">
                            <i class="fas fa-users mr-2"></i> Funcionários
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('vacinas.index') }}" class="hover:bg-blue-700 p-2 block text-white">
                            <i class="fas fa-syringe mr-2"></i> Vacinas
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="confirmLogout()" class="hover:bg-blue-700 p-2 block text-white">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<script src="{{ asset('js/partials/mobileMenuAction.js') }}"></script>
<script src="{{ asset('js/auth/logout.js') }}"></script>
