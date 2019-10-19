<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $table = 'calificaciones';
    
    protected $fillable = [
        'calificacion'                   
    ]; 

    public function ratingable()
    {
        return $this->morphTo();
    } 


}
