<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Ejecuta las migraciones para crear la tabla 'vehiculos'.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('placa')->unique();
            $table->string('color');
            $table->string('marca');
            $table->string('tipo'); // Puedes ajustar el tipo de datos según sea necesario
            $table->foreignId('conductor_id')->constrained('personas');
            $table->foreignId('propietario_id')->constrained('personas');
            $table->timestamps();
        });
    }

    /**
     * Reversa las migraciones para eliminar la tabla 'vehiculos'.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehiculos');
    }
}
