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

    public function edit($id)
    {
        $controle = Controle::findOrFail($id);
        $funcionario = Funcionario::findOrFail($controle->id_funcionario);
        $vacinas = Vacina::all();

        return view('controles.edit', compact('controle', 'funcionario', 'vacinas'));
    }


    public function update(ControleRequest $request, $id)
    {
        $validatedData = $request->validated();

        $controle = Controle::findOrFail($id);

        $controle->update([
            'id_vacina' => $validatedData['id_vacina'],
            'dose' => $validatedData['dose'],
            'data_aplicacao' => $validatedData['data_aplicacao'],
        ]);

        return redirect()->route('controles.index')->with('success', 'Vacina atualizada com sucesso.');
    }


    public function destroy($id)
    {
        $controle = Controle::findOrFail($id);
        $controle->delete();

        return redirect()->route('controles.index')->with('success', 'Vacina removida com sucesso.');
    }

}
