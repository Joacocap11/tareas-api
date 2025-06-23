<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['nombre'];

    public function tareas()
    {
        return $this->belongsToMany(Tarea::class, 'categoria_tarea');
    }
}

?>