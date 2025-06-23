<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = [
        'tarea_id',
        'usuario_id',
        'contenido'
    ];

    public function tarea()
    {
        return $this->belongsTo(Tarea::class);
    }
}

?>