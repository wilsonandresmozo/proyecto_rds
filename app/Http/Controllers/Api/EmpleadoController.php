<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    public function index()
    {
        return Empleado::all();
    }
    public function show($id)
    {
        return Empleado::findOrFail($id);
    }

    public function store(Request $request)
    {
        $empleado = Empleado::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'fecha_ingreso' => $request->fecha_ingreso,
            'salario' => $request->salario,
            'estado' => $request->estado,
            'cargo_id' => $request->cargo_id
        ]);

        return response()->json($empleado, 201);
    }

    public function update(Request $request, $id)
    {
        $empleado = Empleado::findOrFail($id);

        $empleado->update([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'fecha_ingreso' => $request->fecha_ingreso,
            'salario' => $request->salario,
            'estado' => $request->estado,
            'cargo_id' => $request->cargo_id
        ]);

        return response()->json($empleado);
    }

    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);

        $empleado->delete();

        return response()->json([
            'mensaje' => 'Empleado eliminado correctamente'
        ]);
    }
    
}
