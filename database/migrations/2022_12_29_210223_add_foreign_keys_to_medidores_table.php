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
        Schema::table('medidores', function (Blueprint $table) {
            $table->foreign(['idCanton'], 'MedidorCanton')->references(['idCanton'])->on('canton')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['idUsuario'], 'medidorUsuario')->references(['idUsuario'])->on('usuario')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medidores', function (Blueprint $table) {
            $table->dropForeign('MedidorCanton');
            $table->dropForeign('medidorUsuario');
        });
    }
};
