<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('existencia_minima')->nullable()->default(null);
            $table->integer('existencia_maxima')->nullable()->default(null);
            $table->integer('existencia')->nullable()->defautl(null);
            $table->tinyInteger('estado')->nullable()->default(1);
            
            $table->integer('entrada')->unsigned()->nullable()->default(null);
            $table->foreign('entrada')->references('id')->on('entradas')->onDelete('cascade');

            $table->integer('salida')->unsigned()->nullable()->default(null);
            $table->foreign('salida')->references('id')->on('salidas')->onDelete('cascade');

            $table->integer('producto')->unsigned()->nullable()->default(null);
            $table->foreign('producto')->references('id')->on('productos')->onDelete('cascade');

            $table->softDeletes();
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
        Schema::dropIfExists('detalle_productos');
    }
}
