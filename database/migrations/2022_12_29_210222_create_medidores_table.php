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
        Schema::create('medidores', function (Blueprint $table) {
            $table->comment('');
            $table->integer('idMedidores', true);
            $table->string('ruta')->nullable();
            $table->string('referencia')->nullable();
            $table->integer('idUsuario')->nullable()->index('idUsuario');
            $table->integer('idCanton')->nullable()->index('MedidorCanton');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medidores');
    }
};
