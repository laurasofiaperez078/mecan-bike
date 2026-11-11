<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detalle_servicio', function (Blueprint $table) {
            $table->id('id_det_servicio'); 
            $table->unsignedBigInteger('id_orden');
            $table->unsignedBigInteger('id_servicio'); 
            $table->decimal('precio', 10, 2);

            $table->timestamps();
            $table->softDeletes();

           
            $table->foreign('id_orden')->references('id_orden')->on('orden')->onDelete('cascade');
            $table->foreign('id_servicio')->references('id_servicio')->on('servicio')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detalle_servicio');
    }
};
