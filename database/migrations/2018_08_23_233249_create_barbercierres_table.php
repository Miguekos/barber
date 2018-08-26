<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarbercierresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barbercierres', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('barbero_id')->nullable();
            $table->string('barbero')->nullable();
            $table->float('por_pagar')->nullable();
            $table->float('recaudado')->nullable();
            $table->float('ganancia')->nullable();
            $table->timestamp('fecha')->nullable();
            $table->integer('activo');
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
        Schema::dropIfExists('barbercierres');
    }
}
