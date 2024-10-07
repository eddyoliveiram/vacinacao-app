{{-- partials/sidebar.blade.php --}}
<nav class="bg-blue-600 text-white p-4 flex justify-between items-center">
    <div class="flex items-center">
        <h1 class="text-2xl font-bold">Vacinação App</h1>
    </div>

    <ul class="hidden md:flex space-x-6">
        <li>
            <a href="{{ route('dashboard') }}" class="hover:bg-blue-700 transition duration-200 px-4 py-2 rounded">
                <i class="fas fa-chart-line mr-2"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('controle') }}" class="hover:bg-blue-700 transition duration-200 px-4 py-2 rounded">
                <i class="fas fa-clipboard-list mr-2"></i> Controle de Vacinação
            </a>
        </li>
        <li>
            <a href="{{ route('funcionarios') }}" class="hover:bg-blue-700 transition duration-200 px-4 py-2 rounded">
                <i class="fas fa-users mr-2"></i> Funcionários
            </a>
        </li>
        <li>
            <a href="{{ route('vacinas') }}" class="hover:bg-blue-700 transition duration-200 px-4 py-2 rounded">
                <i class="fas fa-syringe mr-2"></i> Vacinas
            </a>
        </li>
        <li>
            <a href="#" onclick="confirmLogout()" class="hover:bg-blue-700 transition duration-200 px-4 py-2 rounded">
                <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </a>
        </li>
    </ul>

    <button id="menuToggle" class="text-white focus:outline-none md:hidden">
        <i class="fas fa-bars fa-2x"></i>
    </button>
</nav>

<div id="mobileMenu" class="fixed inset-0 bg-blue-600 bg-opacity-95 text-white hidden z-50 flex flex-col items-center justify-center">
    <button id="closeMenu" class="absolute top-4 right-4 text-3xl">
        <i class="fas fa-times"></i>
    </button>
    <nav class="space-y-6 text-center">
        <a href="{{ route('dashboard') }}" class="text-2xl hover:bg-blue-700 transition duration-200 px-6 py-2 rounded">Dashboard</a>
        <a href="{{ route('controle') }}" class="text-2xl hover:bg-blue-700 transition duration-200 px-6 py-2 rounded">Controle de Vacinação</a>
        <a href="{{ route('funcionarios') }}" class="text-2xl hover:bg-blue-700 transition duration-200 px-6 py-2 rounded">Funcionários</a>
        <a href="{{ route('vacinas') }}" class="text-2xl hover:bg-blue-700 transition duration-200 px-6 py-2 rounded">Vacinas</a>
        <a href="#" onclick="confirmLogout()" class="text-2xl hover:bg-blue-700 transition duration-200 px-6 py-2 rounded">Logout</a>
    </nav>
</div>

<script>
    function confirmLogout() {
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
                window.location.href = "{{ route('logout') }}";
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        const menuToggle = document.getElementById('menuToggle');
        const mobileMenu = document.getElementById('mobileMenu');
        const closeMenu = document.getElementById('closeMenu');

        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        closeMenu.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
        });
    });
</script>
