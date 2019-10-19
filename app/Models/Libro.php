<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
     protected $table = 'libros';
    
      protected $fillable = [
        'titulo',
        'sinopsis',
        'genero',
        'editorial_id'
                        
    ]; 

    
    public function editorial()
    {
        return $this->belongsTo('App\Models\Editorial');
    }

    public function alumnos()
    {
        return $this->belongsToMany('App\Models\Alumno','prestamos')->withTimestamps();
    }

    public function calificaciones()
    {
        return $this->morphMany('App\Models\Calificacion', 'ratingable');
    }


}
