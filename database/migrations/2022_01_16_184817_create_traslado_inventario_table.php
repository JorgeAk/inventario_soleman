<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrasladoInventarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traslado_inventario', function (Blueprint $table) {
            $table->id();
            $table->integer('id_producto');
            $table->integer('id_origen');
            $table->integer('id_destino');
            $table->integer('cantidad');
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
        Schema::dropIfExists('traslado_inventario');
    }
}
