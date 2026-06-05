<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FuncionCargo;

class FuncionCargoController extends Controller
{
    public function index()
    {
        return FuncionCargo::all();
    }

    public function show($id)
    {
        return FuncionCargo::findOrFail($id);
    }

    public function store(Request $request)
    {
        $funcionCargo = FuncionCargo::create([
            'descripcion_funcion' => $request->descripcion_funcion,
            'estado' => $request->estado,
            'cargo_id' => $request->cargo_id
        ]);

        return response()->json($funcionCargo, 201);
    }

    public function update(Request $request, $id)
    {
        $funcionCargo = FuncionCargo::findOrFail($id);

        $funcionCargo->update([
            'descripcion_funcion' => $request->descripcion_funcion,
            'estado' => $request->estado,
            'cargo_id' => $request->cargo_id
        ]);

        return response()->json($funcionCargo);
    }

    public function destroy($id)
    {
        $funcionCargo = FuncionCargo::findOrFail($id);

        $funcionCargo->delete();

        return response()->json([
            'mensaje' => 'Funcion de cargo eliminada correctamente'
        ]);
    }
}