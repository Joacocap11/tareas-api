<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function index()
    {
        return Tarea::with(['categorias', 'comentarios'])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'cuerpo' => 'required|string',
            'autor_id' => 'required|integer',
            'usuario_asignado_id' => 'nullable|integer',
            'fecha_expiracion' => 'nullable|date',
            'categorias' => 'array' // IDs de categorías opcionales
        ]);

        $tarea = Tarea::create($request->only([
            'titulo', 'cuerpo', 'autor_id', 'usuario_asignado_id', 'fecha_expiracion'
        ]));

        if ($request->has('categorias')) {
            $tarea->categorias()->sync($request->categorias);
        }

        return response()->json($tarea->load('categorias'), 201);
    }

    public function show($id)
    {
        $tarea = Tarea::with(['categorias', 'comentarios'])->findOrFail($id);
        return response()->json($tarea);
    }

    public function update(Request $request, $id)
    {
        $tarea = Tarea::findOrFail($id);

        $tarea->update($request->only([
            'titulo', 'cuerpo', 'usuario_asignado_id', 'fecha_expiracion'
        ]));

        if ($request->has('categorias')) {
            $tarea->categorias()->sync($request->categorias);
        }

        return response()->json($tarea->load('categorias'));
    }

    public function destroy($id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->delete();

        return response()->json(['message' => 'Tarea eliminada']);
    }
}

?>