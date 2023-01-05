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
        Schema::table('consumo', function (Blueprint $table) {
            $table->foreign(['idMedidores'], 'ConsumoMedidores')->references(['idMedidores'])->on('medidores')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consumo', function (Blueprint $table) {
            $table->dropForeign('ConsumoMedidores');
        });
    }
};
