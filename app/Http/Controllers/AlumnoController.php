<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Informacion;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index()
    { 
        $alumno = Alumno::with('informacion')->get();
        //return csrf_token();
        return $alumno;
    }

    public function store(Request $request)
    {
        $alumno = new Alumno(); // Crear un objeto de la clase alumno

        $alumno->nombre  = $request->nombre;
        $alumno->apellido = $request->apellido;

        $alumno->save(); // Guarda el alumno


        $informacion = new Informacion();

        $informacion->direccion = $request->direccion;
        $informacion->telefono = $request->telefono;


        $alumno->informacion()->save($informacion); // Aqui se guarda la informacion del alumno
    }

    public function update(Request $request, $id)
    {
        $alumno =  Alumno::find($id);

        $alumno->nombre  = $request->nombre;
        $alumno->apellido = $request->apellido;

        $alumno->update();

        $informacion['direccion'] = $request->direccion;
        $informacion['telefono'] = $request->telefono;


        $alumno->informacion()->update($informacion);
    }
}
