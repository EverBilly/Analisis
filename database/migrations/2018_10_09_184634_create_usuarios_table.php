<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nombre')->default(null);
            $table->text('apellido')->default(null);
            $table->text('telefono')->default(null);
            $table->text('password')->bcrypt()->default(null);
            $table->tinyInteger('estado')->nullable()->default(1);

            $table->integer('rol')->unsigned()->nullable()->default();
            $table->foreign('rol')->references('id')->on('roles')->onDelete('cascade');


            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
