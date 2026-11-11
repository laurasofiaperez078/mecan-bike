<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
 Schema::create('usuarios', function (Blueprint $table) {
    $table->id('id_usuario');
    $table->string('nombre');
    $table->string('documento');
    $table->string('usuario');
    $table->string('clave');
    $table->string('rol');
    $table->boolean('activo');
    $table->timestamps();
    $table->softDeletes();
    $table->timestamps();
});
    }

    public function  down():  void 
    {
        schema::dropIfErxists(´usuario´);
    }
};