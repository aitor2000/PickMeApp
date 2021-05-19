<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('usuarios', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->nullable();
            $table->primary('id');
            $table->foreign('id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->timestamps();
            $table->string('nombre')->nullable();
            $table->string('apellidos')->nullable();
            $table->string('mail')->nullable();
            $table->boolean('conductor')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('direccion')->nullable();
            $table->string('localidad')->nullable();
            $table->unsignedBigInteger('instituto_id')->nullable();
            $table->foreign('instituto_id')
                ->references('id')->on('institutos')
                ->onDelete('cascade');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
