
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orden_servicio', function (Blueprint $table) {
            
            $table->id('id_orden');

            
            $table->unsignedBigInteger('id_bicicleta');
            $table->unsignedBigInteger('id_usuario');

            
            $table->date('fecha_ingreso');
            $table->date('fecha_entrega')->nullable();
            $table->string('estado');
            $table->string('diagnostico')->nullable();
            $table->decimal('total', 10, 2)->default(0);

            
            $table->foreign('id_bicicleta');
                  

            $table->foreign('id_usuario');
                  
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orden_servicio');
    }
};