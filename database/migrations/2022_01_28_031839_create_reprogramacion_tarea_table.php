<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReprogramacionTareaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reprogramacion_tarea', function (Blueprint $table) {
            $table->id();
            $table->text('motivo');
            $table->integer('f_inicio');
            $table->integer('f_fin');
            $table->integer('id_tarea');
            $table->integer('id_diagrama');
            $table->string('color');
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
        Schema::dropIfExists('reprogramacion_tarea');
    }
}
