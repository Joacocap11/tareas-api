<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function index()
    {
        return Comentario::with('tarea')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'tarea_id' => 'required|exists:tareas,id',
            'usuario_id' => 'required|integer',
            'contenido' => 'required|string'
        ]);

        $comentario = Comentario::create($request->only([
            'tarea_id',
            'usuario_id',
            'contenido'
        ]));

        return response()->json($comentario, 201);
    }

    public function update(Request $request, $id)
    {
        $comentario = Comentario::findOrFail($id);

        $request->validate([
            'contenido' => 'required|string'
        ]);

        $comentario->contenido = $request->contenido;
        $comentario->save();

        return response()->json($comentario);
    }

    public function destroy($id)
    {
        $comentario = Comentario::findOrFail($id);
        $comentario->delete();

        return response()->json(['message' => 'Comentario eliminado']);
    }
}

?>