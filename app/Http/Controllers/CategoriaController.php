<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        return Categoria::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|unique:categorias,nombre|max:100'
        ]);

        $categoria = Categoria::create([
            'nombre' => $request->nombre
        ]);

        return response()->json($categoria, 201);
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|unique:categorias,nombre,' . $categoria->id
        ]);

        $categoria->nombre = $request->nombre;
        $categoria->save();

        return response()->json($categoria);
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return response()->json(['message' => 'Categoría eliminada']);
    }
}

?>