<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->string('rol')->nullable();
            $table->string('barber')->nullable();
            $table->integer('barber_id')->nullable();
            $table->float('porcent')->nullable();
        });
    }

}
