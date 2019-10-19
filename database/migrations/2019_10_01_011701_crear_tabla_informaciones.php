<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaInformaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('direccion', 100);
            $table->string('telefono', 100);
            $table->integer('alumno_id')->unsigned();
            $table->foreign('alumno_id')->references('id')
            ->on('alumnos')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informaciones');
    }
}
