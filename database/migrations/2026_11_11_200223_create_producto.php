<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id_producto');
            $table->unsignedBigInteger('id_categoria');
            $table->string('codigo');
            $table->string('nombre');
            $table->string('marca');
            $table->decimal('precio_compra', 10, 2);
            $table->decimal('precio_venta', 10, 2);
            $table->integer('stock_actual');
            $table->integer('stock_minimo');
            $table->timestamps();
            $table->softDeletes();
    

            
            $table->foreign('id_categoria')->references('id_categoria')->on('categorias')->onDelete('cascade');
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};