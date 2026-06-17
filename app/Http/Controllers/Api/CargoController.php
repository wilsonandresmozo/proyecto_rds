<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cargo;

class CargoController extends Controller
{
    public function index()
    {
        return Cargo::with(['empleados', 'funcionesCargo'])->paginate(10);
    }

    public function show($id)
    {
        return Cargo::with(['empleados', 'funcionesCargo'])->findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_cargo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
        ]);

        $cargo = Cargo::create([
            'nombre_cargo' => $request->nombre_cargo,
            'descripcion' => $request->descripcion,
        ]);

        return response()->json($cargo, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_cargo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
        ]);

        $cargo = Cargo::findOrFail($id);

        $cargo->update([
            'nombre_cargo' => $request->nombre_cargo,
            'descripcion' => $request->descripcion,
        ]);

        return response()->json($cargo);
    }

    public function destroy($id)
    {
        $cargo = Cargo::findOrFail($id);

        $cargo->delete();

        return response()->json([
            'mensaje' => 'Cargo eliminado correctamente'
        ]);
    }
}
