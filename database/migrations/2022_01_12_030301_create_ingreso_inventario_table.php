<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresoInventarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso_inventario', function (Blueprint $table) {
            $table->id();
            $table->integer('id_producto');
            $table->integer('id_ubicacion');
            $table->integer('cantidad');
            $table->string('descripcion');
            $table->integer('id_genero');
            $table->integer('tipo');
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
        Schema::dropIfExists('ingreso_inventario');
    }
}
