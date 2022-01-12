<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBajaInventarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baja_inventario', function (Blueprint $table) {
            $table->id();
            $table->integer('id_producto');
            $table->integer('id_ubicacion');
            $table->integer('cantidad');
            $table->string('descripcion');
            $table->integer('id_genero');
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
        Schema::dropIfExists('baja_inventario');
    }
}
