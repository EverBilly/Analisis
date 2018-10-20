<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nombre')->default(null);
            $table->text('descripcion')->default(null);
            $table->double('precio1')->default(null);
            $table->double('precio2')->default(null);
            $table->double('precio3')->default(null);
            $table->double('precio4')->default(null);
            $table->double('precio_anterior')->default(null);
            $table->double('precio_actual')->default(null);
            $table->tinyInteger('estado')->nullable()->default(1);

            $table->integer('categoria')->unsigned()->nullable()->default(null);
            $table->foreign('categoria')->references('id')->on('categorias')->onDelete('cascade');

            $table->integer('medida')->unsigned()->nullable()->default(null);
            $table->foreign('medida')->references('id')->on('medidas')->onDelete('cascade');

            $table->integer('marca')->unsigned()->nullable()->default(null);
            $table->foreign('marca')->references('id')->on('marcas')->onDelete('cascade');


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
        Schema::dropIfExists('productos');
    }
}
