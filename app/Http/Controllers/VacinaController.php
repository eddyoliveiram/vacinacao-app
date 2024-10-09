<?php
namespace App\Http\Controllers;

use App\Models\Vacina;
use App\Http\Requests\VacinaRequest;
use Illuminate\Http\Request;

class VacinaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $cacheKey = 'vacinas_' . ($search ? md5($search) : 'all');

        $vacinas = cache()->remember($cacheKey, 10, function () use ($search) {
            return Vacina::when($search, function ($query, $search) {
                return $query->where('nome', 'ilike', "%{$search}%")
                    ->orWhere('lote', 'ilike', "%{$search}%");
            })
                ->orderBy('nome', 'asc')
                ->paginate(5);
        });

        return view('vacinas.index', compact('vacinas'));
    }



    public function create()
    {
        return view('vacinas.create');
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
        return view('vacinas.edit', compact('vacina'));
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
