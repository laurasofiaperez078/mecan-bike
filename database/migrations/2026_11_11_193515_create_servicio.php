
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('servicio', function (Blueprint $table) {
            $table->id('id_servicio');
            $table->string('nombre');
            $table->string('descripcion');
            $table->decimal('precio_base', 10, 2);

            $table->timestamps();
            $table->softDeletes();

            
            $table->foreign('id_usuario');
                  
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('servicio');
    }
};




