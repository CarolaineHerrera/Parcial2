<?php

namespace App\Http\Controllers;

use App\Models\Editorial;
use App\Models\Libro;
use Illuminate\Http\Request;

class EditorialController extends Controller
{
    public function index()
    { 
        $editorial = Editorial::with('libros')->get();
        return $editorial;
    }

    public function store(Request $request)
    {
        $editorial = new Editorial();

        $editorial->nombre  = $request->nombre;
        
        $editorial->save();

        $editorial->libros()->saveMany([
            new Libro([
                'titulo' => $request->titulo,
                'sinopsis' => $request->sipnosis,
                'genero' => $request->genero,
            ]),
            new Libro([
                'titulo' => $request->titulo_dos,
                'sinopsis' => $request->sipnosis_dos,
                'genero' => $request->genero_dos,
            ]),
        ]);
    }

    public function update(Request $request, $id)
    {
        $editorial =  Editorial::find($id);

        $editorial->nombre  = $request->nombre;
         
        $editorial->update();

        $libro = Libro::find($request->idlibro);

        $libro->titulo = $request->titulo;
        $libro->sinopsis = $request->sipnosis;
        $libro->genero = $request->genero;

        $libro->update();
    }
}
