<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCortesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cortes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('motivo_id')->nullable();
            $table->string('motivo')->nullable();
            $table->float('valor')->nullable();
            $table->float('porcent')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('barber_id')->nullable();
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
        Schema::dropIfExists('cortes');
    }
}
