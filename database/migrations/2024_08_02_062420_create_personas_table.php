<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Ejecuta las migraciones para crear la tabla 'personas'.
     *
     * @return void
     */
    public function up()
    {
        // Verifica si la tabla 'personas' no existe antes de crearla.
        if (!Schema::hasTable('personas')) {
            Schema::create('personas', function (Blueprint $table) {
                $table->id();
                $table->string('nombre');
                $table->string('apellido');
                $table->string('dni')->unique();
                $table->string('direccion')->nullable();
                $table->string('telefono')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reversa las migraciones para eliminar la tabla 'personas'.
     *
     * @return void
     */
    public function down()
    {
        // Elimina la tabla 'personas' si existe.
        if (Schema::hasTable('personas')) {
            Schema::dropIfExists('personas');
        }
    }
}
