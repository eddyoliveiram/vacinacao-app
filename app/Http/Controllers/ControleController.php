<?php
namespace App\Http\Controllers;

use App\Http\Requests\ControleRequest;
use App\Models\Controle;
use App\Models\Funcionario;
use App\Models\Vacina;
use Illuminate\Http\Request;

class ControleController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Carrega os funcionários com suas vacinas (automaticamente com a tabela de controle como pivô)
        $funcionarios = Funcionario::with(['vacinas'])
            ->when($search, function ($query, $search) {
                return $query->where('nome_completo', 'ilike', "%{$search}%")
                    ->orWhere('cpf', 'ilike', "%{$search}%");
            })
            ->orderBy('nome_completo', 'asc')
            ->paginate(3);

        return view('controles.index', compact('funcionarios'));
    }


    public function create(Funcionario $funcionario)
    {
        $vacinas = Vacina::all();
        return view('controles.create', compact('funcionario', 'vacinas'));
    }

    public function store(ControleRequest $request)
    {
        $validatedData = $request->validated();

        $funcionario = Funcionario::find($validatedData['id_funcionario']);

        $funcionario->vacinas()->attach($validatedData['id_vacina'], [
            'dose' => $validatedData['dose'],
            'data_aplicacao' => $validatedData['data_aplicacao'],
        ]);

        return redirect()->route('controles.index')->with('success', 'Vacina adicionada com sucesso.');
    }

    public function edit(Funcionario $funcionario, Vacina $vacina)
    {
        $controle = $funcionario->vacinas()->where('id_vacina', $vacina->id)->firstOrFail();
        $vacinas = Vacina::all();
        return view('controles.edit', compact('funcionario', 'vacina', 'controle', 'vacinas'));
    }


    public function update(ControleRequest $request, Controle $controle)
    {
        $validatedData = $request->validated();

        $controle->funcionario->vacinas()->detach($controle->vacina_id);
        $controle->funcionario->vacinas()->attach($validatedData['id_vacina'], [
            'dose' => $validatedData['dose'],
            'data_aplicacao' => $validatedData['data_aplicacao'],
        ]);

        return redirect()->route('controles.index')->with('success', 'Vacina atualizada com sucesso.');
    }

    public function destroy(Funcionario $funcionario, Vacina $vacina)
    {
        $funcionario->vacinas()->detach($vacina->id);
        return redirect()->route('controles.index')->with('success', 'Vacina removida com sucesso.');
    }
}
