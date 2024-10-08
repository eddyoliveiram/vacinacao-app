<?php

namespace App\Http\Controllers;

use App\Models\Controle;
use App\Http\Requests\ControleRequest;

class ControleController extends Controller
{
    public function index()
    {
        $controles = Controle::with('funcionario', 'vacina')->get();
        return response()->json([
            'status' => 'success',
            'data' => $controles
        ], 200);
    }

    public function store(ControleRequest $request)
    {
        $controle = Controle::create($request->validated());
        return response()->json([
            'message' => 'Aplicação registrada com sucesso.',
            'controle' => $controle
        ], 201);
    }

    public function show(Controle $controle)
    {
        return response()->json([
            'status' => 'success',
            'controle' => $controle
        ], 200);
    }

    public function update(ControleRequest $request, Controle $controle)
    {
        $controle->update($request->validated());
        return response()->json([
            'message' => 'Aplicação atualizada com sucesso.',
            'controle' => $controle
        ], 200);
    }

    public function destroy(Controle $controle)
    {
        $controle->delete();
        return response()->json([
            'message' => 'Aplicação removida com sucesso.'
        ], 200);
    }
}
