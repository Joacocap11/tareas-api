<?php

use App\Http\Controllers\TareaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComentarioController;

Route::apiResource('tareas', TareaController::class);
Route::apiResource('categorias', CategoriaController::class)->except(['show']);
Route::apiResource('comentarios', ComentarioController::class)->except(['show']);


?>