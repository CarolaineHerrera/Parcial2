<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Informacion extends Model
{
 protected $table = 'informaciones';
    
 protected $fillable = [
        'direccion',
        'telefono',
        'alumno_id'
                        
    ]; 

     public function alumno()
    {
        return $this->belongsTo('App\Models\Alumno');
    }
}
