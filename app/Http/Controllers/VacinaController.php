<?php
namespace App\Http\Controllers;

use App\Models\Vacina;
use App\Http\Requests\VacinaRequest;

class VacinaController extends Controller
{
    public function index()
    {
        $vacinas = Vacina::all();
        return view('vacinas.index', compact('vacinas'));
    }

    public function create()
    {
//        return view('vacinas.create');
    }

    public function store(VacinaRequest $request)
    {
        Vacina::create($request->validated());
        return redirect()->route('vacinas.index')->with('success', 'Vacina criada com sucesso.');
    }

    public function show(Vacina $vacina)
    {
//        return view('vacinas.show', compact('vacina'));
    }

    public function edit(Vacina $vacina)
    {
//        return view('vacinas.edit', compact('vacina'));
    }

    public function update(VacinaRequest $request, Vacina $vacina)
    {
        $vacina->update($request->validated());
        return redirect()->route('vacinas.index')->with('success', 'Vacina atualizada com sucesso.');
    }

    public function destroy(Vacina $vacina)
    {
        $vacina->delete();
        return redirect()->route('vacinas.index')->with('success', 'Vacina removida com sucesso.');
    }
}
