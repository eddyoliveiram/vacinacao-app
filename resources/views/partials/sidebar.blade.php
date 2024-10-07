{{-- partials/sidebar.blade.php --}}
<aside class="bg-blue-600 text-white w-64 flex-shrink-0 hidden md:block">
    <div class="p-4">
        <h1 class="text-2xl font-bold">Vacinação App</h1>
    </div>
    <nav class="mt-8">
        <ul class="space-y-2">
            <li>
                <a href="{{ route('dashboard') }}" class="block py-2 px-4 hover:bg-blue-700 transition duration-200">
                    <i class="fas fa-chart-line mr-2"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('controle') }}" class="block py-2 px-4 hover:bg-blue-700 transition duration-200">
                    <i class="fas fa-clipboard-list mr-2"></i> Controle de Vacinação
                </a>
            </li>
            <li>
                <a href="{{ route('funcionarios') }}" class="block py-2 px-4 hover:bg-blue-700 transition duration-200">
                    <i class="fas fa-users mr-2"></i> Funcionários
                </a>
            </li>
            <li>
                <a href="{{ route('vacinas') }}" class="block py-2 px-4 hover:bg-blue-700 transition duration-200">
                    <i class="fas fa-syringe mr-2"></i> Vacinas
                </a>
            </li>
            <li>
                <a href="#" onclick="confirmLogout()" class="block py-2 px-4 hover:bg-blue-700 transition duration-200">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
            </li>
        </ul>
    </nav>
</aside>

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
</script>
