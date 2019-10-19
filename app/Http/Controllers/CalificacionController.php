<?php

namespace App\Http\Controllers;

use App\Models\Calificacion;
use App\Models\Libro;
use Illuminate\Http\Request;

class CalificacionController extends Controller
{
    public function index()
    {
        $libro = Libro::with('calificaciones')->get();
        return $libro;
    }

    public function store(Request $request)
    {

        $libro =  Libro::find($request->idlibro);

        $libro->calificaciones()->saveMany([
            new Calificacion([
                'calificacion' => $request->rating_1,
            ]),
            new Calificacion([
                'calificacion' => $request->rating_2,
            ]),
        ]);
    }

    public function update(Request $request, $id)
    {
        $libro =  Libro::find($request->idlibro);

        $libro->titulo = $request->titulo;
        $libro->sinopsis = $request->sipnosis;
        $libro->genero = $request->genero;

        
        $libro->calificaciones[0]->calificacion = $request->rating_1;
        $libro->calificaciones[1]->calificacion = $request->rating_2;

        $libro->push();
    }

    public function destroy($id)
    {
        $libro =  Libro::find($id);
        
        $libro->calificaciones()->delete();
    }
}
