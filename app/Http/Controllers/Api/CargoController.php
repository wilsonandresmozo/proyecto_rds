<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cargo;

class CargoController extends Controller
{
    public function index()
    {
        return Cargo::all();
    }

    public function show($id)
    {
        return Cargo::findOrFail($id);
    }

    public function store(Request $request)
    {
        $cargo = Cargo::create([
            'nombre_cargo' => $request->nombre_cargo,
            'descripcion' => $request->descripcion,
        ]);

        return response()->json($cargo, 201);
    }

    public function update(Request $request, $id)
    {
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