<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{

    public function index(Request $request)
    {
        $query = $request->input('query');
        $medicos = Medico::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('nombre', 'like', '%' . $query . '%')
                ->orWhere('especialidad', 'like', '%' . $query . '%');
        })->paginate(10);

        return view('medicos.index', compact('medicos'));
    }



    public function create()
    {
        return view ('medicos.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'especialidad' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:15',
            'email' => 'required|email|unique:medicos',
        ]);

        Medico::create($request->all());
        return redirect()->route('medicos.index')->with('success', 'Médico creado exitosamente.');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'especialidad' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:15',
            'email' => 'required|email|unique:medicos,email,' . $id,
        ]);
        $medico = Medico::findOrFail($id);
        $medico->update($request->all());
        return redirect()->route('medico.index')->with('success', 'Medico actualzado correctamente.');
    }



    public function destroy(string $id)
    {
        $medico=Medico::findOrFail($id);
        $medico->delete();
        return redirect()->route('medicos.index')->with('succes','Meduco eliminado exitosamente ');
    }
}
