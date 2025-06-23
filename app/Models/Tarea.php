<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $fillable = [
        'titulo',
        'cuerpo',
        'autor_id',
        'usuario_asignado_id',
        'fecha_expiracion'
    ];

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'categoria_tarea');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}

?>