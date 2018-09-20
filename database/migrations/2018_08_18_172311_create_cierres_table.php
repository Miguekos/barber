<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCierresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cierres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ventas_cortes')->nullable();
            $table->string('ventas_productos')->nullable();
            $table->string('por_pagar')->nullable();
            $table->string('total')->nullable();
            $table->string('ganancia')->nullable();
            $table->string('gastos_varios')->nullable();
            $table->timestamp('fecha')->nullable();
            $table->integer('cantidad_cortes')->nullable();
            $table->integer('barber_id')->nullable();
            $table->float('efectivo')->nullable();
            $table->float('tarjeta')->nullable();
            $table->string('zero_config_length')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cierres');
    }
}
