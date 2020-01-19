<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntrenorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antrenori', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unique();
            $table->string('descriere')->nullable(); // abilitati afisate in pagina Antrenori pentru user
            $table->integer('salariu');
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
        Schema::dropIfExists('antrenori');
    }
}
