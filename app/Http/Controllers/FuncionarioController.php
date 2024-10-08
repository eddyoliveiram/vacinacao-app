<?php
namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Http\Requests\FuncionarioRequest;

class FuncionarioController extends Controller
{
    public function index()
    {
        $funcionarios = Funcionario::all();
        return view('funcionarios.index', compact('funcionarios'));
    }

    public function create()
    {
//        return view('funcionarios.create');
    }

    public function store(FuncionarioRequest $request)
    {
        Funcionario::create($request->validated());
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário criado com sucesso.');
    }

    public function show(Funcionario $funcionario)
    {
//        return view('funcionarios.show', compact('funcionario'));
    }

    public function edit(Funcionario $funcionario)
    {
//        return view('funcionarios.edit', compact('funcionario'));
    }

    public function update(FuncionarioRequest $request, Funcionario $funcionario)
    {
        $funcionario->update($request->validated());
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário atualizado com sucesso.');
    }

    public function destroy(Funcionario $funcionario)
    {
        $funcionario->delete();
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário removido com sucesso.');
    }
}
