<div id="vacinaModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h3 class="text-xl font-bold mb-4" id="modalTituloVacina">Adicionar Vacina</h3>
        <form id="vacinaForm">
            @csrf
            <input type="hidden" id="vacinaId" name="id">
            <!-- Nome da Vacina -->
            <div class="mb-4">
                <label for="nome" class="block text-gray-700 text-sm font-bold mb-2">Nome da Vacina</label>
                <input type="text" id="nome" name="nome" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <!-- Lote -->
            <div class="mb-4">
                <label for="lote" class="block text-gray-700 text-sm font-bold mb-2">Lote</label>
                <input type="text" id="lote" name="lote" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <!-- Data de Validade -->
            <div class="mb-4">
                <label for="validade" class="block text-gray-700 text-sm font-bold mb-2">Data de Validade</label>
                <input type="date" id="validade" name="validade" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <!-- Botões -->
            <div class="flex justify-end">
                <button type="button" class="mr-4 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600"
                        onclick="fecharModalVacina()">Cancelar</button>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Salvar
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Script para controlar o modal de vacinas -->
<script>
    function abrirModalVacina(acao, id = null) {
        const modalTitulo = document.getElementById('modalTituloVacina');
        const vacinaForm = document.getElementById('vacinaForm');
        const vacinaId = document.getElementById('vacinaId');

        if (acao === 'adicionar') {
            modalTitulo.innerText = 'Adicionar Vacina';
            vacinaForm.reset(); // Limpar o formulário
        } else if (acao === 'editar') {
            modalTitulo.innerText = 'Editar Vacina';
            // Aqui você pode fazer uma requisição AJAX para buscar os dados da vacina pelo ID
            // e preencher os campos correspondentes
            vacinaId.value = id;
        }

        document.getElementById('vacinaModal').classList.remove('hidden');
    }

    function fecharModalVacina() {
        document.getElementById('vacinaModal').classList.add('hidden');
    }

    function confirmarExcluirVacina(id) {
        if (confirm('Deseja realmente excluir esta vacina?')) {
            // Lógica de exclusão com base no ID
        }
    }
</script>
