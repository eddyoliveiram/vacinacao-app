<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Http\Requests\FuncionarioRequest;

class FuncionarioController extends Controller
{
    public function index()
    {
        $funcionarios = Funcionario::all();
        return response()->json($funcionarios, 200);
    }

    public function store(FuncionarioRequest $request)
    {
        $funcionario = Funcionario::create($request->validated());
        return response()->json([
            'message' => 'Funcionário criado com sucesso.',
            'funcionario' => $funcionario
        ], 201);
    }

    public function show(Funcionario $funcionario)
    {
        return response()->json($funcionario, 200);
    }

    public function update(FuncionarioRequest $request, Funcionario $funcionario)
    {
        $funcionario->update($request->validated());
        return response()->json([
            'message' => 'Funcionário atualizado com sucesso.',
            'funcionario' => $funcionario
        ], 200);
    }

    public function destroy(Funcionario $funcionario)
    {
        $funcionario->delete();
        return response()->json([
            'message' => 'Funcionário removido com sucesso.'
        ], 200);
    }
}
