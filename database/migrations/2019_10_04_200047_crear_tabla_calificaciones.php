<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaCalificaciones extends Migration
{

    public function up()
    {
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('calificacion');
            $table->morphs('ratingable');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('calificaciones');
    }
}
