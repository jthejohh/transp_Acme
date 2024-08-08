<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index()
    {
        $personas = Persona::all();
        return response()->json($personas);
    }

    public function show($id)
    {
        $persona = Persona::find($id);
        if (!$persona) {
            return response()->json(['message' => 'Persona no encontrada'], 404);
        }
        return response()->json($persona);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'tipo_documento' => 'required|string|max:20',
            'numero_documento' => 'required|string|max:20|unique:personas',
            'telefono' => 'required|string|max:15',
            'direccion' => 'required|string|max:100',
        ]);

        $persona = Persona::create($request->all());
        return response()->json($persona, 201);
    }

    public function update(Request $request, $id)
    {
        $persona = Persona::find($id);
        if (!$persona) {
            return response()->json(['message' => 'Persona no encontrada'], 404);
        }

        $request->validate([
            'nombre' => 'string|max:50',
            'tipo_documento' => 'string|max:20',
            'numero_documento' => 'string|max:20|unique:personas,numero_documento,' . $id,
            'telefono' => 'string|max:15',
            'direccion' => 'string|max:100',
        ]);

        $persona->update($request->all());
        return response()->json($persona);
    }

    public function destroy($id)
    {
        $persona = Persona::find($id);
        if (!$persona) {
            return response()->json(['message' => 'Persona no encontrada'], 404);
        }
        $persona->delete();
        return response()->json(['message' => 'Persona eliminada']);
    }
}
