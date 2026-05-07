<?php

use App\Http\Controllers\PeliculasController;
use App\Http\Controllers\SociosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('peliculas', PeliculasController::class);
Route::apiResource('socios', SociosController::class);
