<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class  PrestamoController extends Controller
{
    public function index()
    { 
        $alumno = Alumno::with('libros')->get();
        return $alumno;
    }

    public function store(Request $request)
    {
        $alumno = Alumno::find($request->idalumno);

        $alumno->libros()->attach([$request->idlibro]); 
        
    }

    public function update(Request $request, $id)
    {
        $alumno = Alumno::find($id);

        $alumno->libros()->sync([$request->idlibro]); 
        
    }
}
