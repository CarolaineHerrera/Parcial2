<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumnos';

    protected $fillable = [
        'nombre',
        'apellido',
    ];

    public function informacion()
    {
        return $this->hasOne('App\Models\Informacion');
    }

    public function libros()
    {
        return $this->belongsToMany('App\Models\Libro','prestamos');
    }
}
