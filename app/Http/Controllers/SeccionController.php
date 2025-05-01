<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use App\Models\Alumno;
use Illuminate\Http\Request;

class SeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $secciones = Seccion::all();
        return view('secciones.index', compact('secciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Puedes agregar lógica para el formulario de creación si es necesario
        return view('secciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Lógica para guardar una nueva sección
    }

    /**
     * Display the specified resource.
     */
    public function show(Seccion $seccion)
    {
        $alumnos = Alumno::all();
        $alumnosInscritos = $seccion->alumnos; // Accede a la relación muchos a muchos
        return view('secciones.show', compact('seccion', 'alumnos', 'alumnosInscritos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seccion $seccion)
    {
        // Puedes agregar lógica para el formulario de edición si es necesario
        return view('secciones.edit', compact('seccion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seccion $seccion)
    {
        // Lógica para actualizar la sección
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seccion $seccion)
    {
        // Lógica para eliminar la sección
    }

    /**
     * Asigna alumnos a la sección.
     */
    public function asignarAlumnos(Request $request, Seccion $seccion)
    {
        $seccion->alumnos()->attach($request->input('alumnos'));
        return redirect()->route('secciones.show', $seccion)->with('success', 'Alumnos asignados correctamente.');
    }
}