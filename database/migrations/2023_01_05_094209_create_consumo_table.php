<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumo', function (Blueprint $table) {
            $table->comment('');
            $table->decimal('lectura_anterior', 10)->nullable()->index('lectura_anterior_2');
            $table->decimal('lectura_actual', 10)->nullable();
            $table->dateTime('fecha_a_facturar')->nullable();
            $table->dateTime('desde')->nullable();
            $table->dateTime('hasta')->nullable();
            $table->decimal('monto', 10)->nullable();
            $table->string('estado', 55)->nullable();
            $table->dateTime('vence')->nullable();
            $table->integer('idMedidores')->nullable()->index('ConsumoMedidores');
            $table->decimal('mora', 10)->nullable();

            $table->index(['lectura_anterior'], 'lectura_anterior');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consumo');
    }
};
