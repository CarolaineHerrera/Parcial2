<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $table = 'prestamos';
    
      protected $fillable = [
        'alumno_id',
        'libro_id',                    
    ]; 

     public function libro()
    {
        return $this->belongsTo('App\Models\Libro');
    }

     public function alumno()
    {
        return $this->belongsTo('App\Models\Alumno');
    }
}
