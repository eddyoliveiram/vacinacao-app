<?php

namespace App\Http\Controllers;

use App\Models\Vacina;
use App\Http\Requests\VacinaRequest;

class VacinaController extends Controller
{
    public function index()
    {
        $vacinas = Vacina::all();
        return response()->json([
            'status' => 'success',
            'data' => $vacinas
        ], 200);
    }

    public function store(VacinaRequest $request)
    {
        $vacina = Vacina::create($request->validated());
        return response()->json([
            'message' => 'Vacina criada com sucesso.',
            'vacina' => $vacina
        ], 201);
    }

    public function show(Vacina $vacina)
    {
        return response()->json([
            'status' => 'success',
            'vacina' => $vacina
        ], 200);
    }

    public function update(VacinaRequest $request, Vacina $vacina)
    {
        $vacina->update($request->validated());
        return response()->json([
            'message' => 'Vacina atualizada com sucesso.',
            'vacina' => $vacina
        ], 200);
    }

    public function destroy(Vacina $vacina)
    {
        $vacina->delete();
        return response()->json([
            'message' => 'Vacina removida com sucesso.'
        ], 200);
    }
}
