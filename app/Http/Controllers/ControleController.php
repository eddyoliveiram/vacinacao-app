<?php
namespace App\Http\Controllers;

use App\Models\Controle;
use App\Http\Requests\ControleRequest;

class ControleController extends Controller
{
    public function index()
    {
        $controles = Controle::with('funcionario', 'vacina')->get();
        return view('controle.index', compact('controles'));
    }

    public function create()
    {
//        return view('controle.create');
    }

    public function store(ControleRequest $request)
    {
        Controle::create($request->validated());
        return redirect()->route('controles.index')->with('success', 'Aplicação registrada com sucesso.');
    }

    public function show(Controle $controle)
    {
//        return view('controle.show', compact('controle'));
    }

    public function edit(Controle $controle)
    {
//        return view('controle.edit', compact('controle'));
    }

    public function update(ControleRequest $request, Controle $controle)
    {
        $controle->update($request->validated());
        return redirect()->route('controles.index')->with('success', 'Aplicação atualizada com sucesso.');
    }

    public function destroy(Controle $controle)
    {
        $controle->delete();
        return redirect()->route('controles.index')->with('success', 'Aplicação removida com sucesso.');
    }
}
