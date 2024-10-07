{{-- partials/funcionario-modal.blade.php --}}
<div id="funcionarioModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h3 class="text-xl font-bold mb-4" id="modalTitulo">Adicionar Funcionário</h3>
        <form id="funcionarioForm">
            @csrf
            <input type="hidden" id="funcionarioId" name="id">
            <div class="mb-4">
                <label for="cpf" class="block text-gray-700 text-sm font-bold mb-2">CPF</label>
                <input type="text" id="cpf" name="cpf" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="nome" class="block text-gray-700 text-sm font-bold mb-2">Nome Completo</label>
                <input type="text" id="nome" name="nome" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="data_nascimento" class="block text-gray-700 text-sm font-bold mb-2">Data de Nascimento</label>
                <input type="date" id="data_nascimento" name="data_nascimento" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="comorbidade" class="block text-gray-700 text-sm font-bold mb-2">Portador de Comorbidade?</label>
                <select id="comorbidade" name="comorbidade" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>

            <div class="flex justify-end">
                <button type="button" class="mr-4 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600"
                        onclick="fecharModalFuncionario()">Cancelar</button>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Salvar
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function abrirModalFuncionario(acao, id = null) {
        const modalTitulo = document.getElementById('modalTitulo');
        const funcionarioForm = document.getElementById('funcionarioForm');
        const funcionarioId = document.getElementById('funcionarioId');

        if (acao === 'adicionar') {
            modalTitulo.innerText = 'Adicionar Funcionário';
            funcionarioForm.reset();
        } else if (acao === 'editar') {
            modalTitulo.innerText = 'Editar Funcionário';
            funcionarioId.value = id;
        }

        document.getElementById('funcionarioModal').classList.remove('hidden');
    }

    function fecharModalFuncionario() {
        document.getElementById('funcionarioModal').classList.add('hidden');
    }

    function confirmarExcluir(id) {
        if (confirm('Deseja realmente excluir este funcionário?')) {
        }
    }
</script>
