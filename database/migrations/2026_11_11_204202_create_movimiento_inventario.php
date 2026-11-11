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
        Schema::create('movimiento_inventarios', function (Blueprint $table) {
            $table->id('id_movimiento');
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_usuario');
            $table->string('tipo');
            $table->integer('cantidad');
            $table->date('fecha');
            $table->string('origen');
            $table->string('motivo');
            $table->timestamps();
            $table->softDeletes();

            
            $table->foreign('id_producto')->references('id_producto')->on('productos')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('movimiento_inventarios');
    }
};