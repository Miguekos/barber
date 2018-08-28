<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idV')->nullable();
            $table->integer('id_factura')->nullable();
            $table->integer('id_producto')->nullable();
            $table->string('nombre')->nullable();
            $table->string('categoria')->nullable();
            $table->integer('cantidad')->nullable();
            $table->float('id_monto')->nullable();
            $table->float('total')->nullable();
            $table->string('estado')->nullable();
            $table->string('activo')->nullable();
            $table->string('atendido')->nullable();
            $table->integer('id_user')->nullable();
            $table->timestamp('hora')->nullable();
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
        Schema::dropIfExists('ventas');
    }
}
