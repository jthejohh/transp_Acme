<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function index()
    {
        $vehiculos = Vehiculo::all();
        return response()->json($vehiculos);
    }

    public function show($id)
    {
        $vehiculo = Vehiculo::find($id);
        if (!$vehiculo) {
            return response()->json(['message' => 'Vehículo no encontrado'], 404);
        }
        return response()->json($vehiculo);
    }

    public function store(Request $request)
    {
        $request->validate([
            'placa' => 'required|string|max:10',
            'color' => 'required|string|max:20',
            'marca' => 'required|string|max:50',
            'tipo' => 'required|string|max:30',
            'conductor_id' => 'required|integer',
            'propietario_id' => 'required|integer',
        ]);

        $vehiculo = Vehiculo::create($request->all());
        return response()->json($vehiculo, 201);
    }

    public function update(Request $request, $id)
    {
        $vehiculo = Vehiculo::find($id);
        if (!$vehiculo) {
            return response()->json(['message' => 'Vehículo no encontrado'], 404);
        }

        $request->validate([
            'placa' => 'string|max:10',
            'color' => 'string|max:20',
            'marca' => 'string|max:50',
            'tipo' => 'string|max:30',
            'conductor_id' => 'integer',
            'propietario_id' => 'integer',
        ]);

        $vehiculo->update($request->all());
        return response()->json($vehiculo);
    }

    public function destroy($id)
    {
        $vehiculo = Vehiculo::find($id);
        if (!$vehiculo) {
            return response()->json(['message' => 'Vehículo no encontrado'], 404);
        }
        $vehiculo->delete();
        return response()->json(['message' => 'Vehículo eliminado']);
    }
}
