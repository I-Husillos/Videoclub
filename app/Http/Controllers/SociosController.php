<?php

namespace App\Http\Controllers;

use App\Models\Socios;
use Illuminate\Http\Request;

class SociosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socios = Socios::all();
        return response()->json($socios, 200);
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:socios,email',
        ]);

        $socio = Socios::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return response()->json([
            'message' => 'Socio created successfully',
            'socio' => $socio,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $lector = Socios::with(['peliculas' => function ($query) {
            $query->orderByPivot('fecha_prestamo', 'desc');
        }])->find($id);

        if (!$lector) {
            return response()->json(['mensaje' => 'Socio no encontrado'], 404);
        }
        return response()->json($lector, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Socios $socios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Socios $socios)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:socios,email,' . $socios->id,
        ]);

        $socios->update($request->only(['name', 'email']));

        return response()->json([
            'message' => 'Socio updated successfully',
            'socio' => $socios,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Socios $socios)
    {
        //
    }
}
