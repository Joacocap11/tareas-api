<?php

use App\Http\Controllers\TareaController;
use App\Http\Controllers\CategoriaController;

Route::apiResource('tareas', TareaController::class);
Route::apiResource('categorias', CategoriaController::class)->except(['show']);


?>