<?php

namespace App\Http\Controllers;

use App\Models\Peliculas;
use Illuminate\Http\Request;

class PeliculasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peliculas = Peliculas::all();
        return response()->json($peliculas, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'director' => 'required|string|max:255',
        ]);

        $pelicula = Peliculas::create([
            'title' => $request->title,
            'director' => $request->director,
        ]);

        return response()->json([
            'message' => 'Película creada exitosamente',
            'pelicula' => $pelicula,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pelicula = Peliculas::with(['socios' => function ($query) {
            $query->orderByPivot('fecha_prestamo', 'desc');
        }])->find($id);

        if (!$pelicula) {
            return response()->json(['mensaje' => 'Película no encontrada'], 404);
        }

        return response()->json($pelicula, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peliculas $peliculas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'director' => 'sometimes|required|string|max:255',
        ]);

        $pelicula = Peliculas::find($id);

        if (!$pelicula) {
            return response()->json(['mensaje' => 'Película no encontrada'], 404);
        }

        $pelicula->update($request->only(['title', 'director']));

        return response()->json([
            'message' => 'Película actualizada exitosamente',
            'pelicula' => $pelicula,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peliculas $peliculas)
    {
        //
    }
}
