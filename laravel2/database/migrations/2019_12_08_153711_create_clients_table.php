<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clienti', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unique();
            $table->string('descriere')->nullable(); //
            $table->string('abonament'); //nume 
            $table->datetime('data_inceput');
            $table->datetime('data_sfarsit');
            $table->integer('pret');
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
        Schema::dropIfExists('clienti');
    }
}
