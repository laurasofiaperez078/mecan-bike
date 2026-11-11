
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
        Schema::create('orden_servicios', function (Blueprint $table) {
            $table->id('id_orden');
            $table->unsignedBigInteger('id_bicicleta');
            $table->unsignedBigInteger('id_usuario');
            $table->date('fecha_ingreso');
            $table->date('fecha_entrega')->nullable();
            $table->string('estado');
            $table->string('diagnostico');
            $table->decimal('total', 10, 2);
            $table->timestamps();

            
            $table->foreign('id_bicicleta')->references('id_bicicleta')->on('bicicletas')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden_servicios');
    }
};