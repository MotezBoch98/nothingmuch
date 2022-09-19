<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbonnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonnes', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('nom', 18)->nullable();
            $table->string('prenom', 18)->nullable();
            $table->string('numcarte', 8)->nullable();
            $table->string('tel', 22)->nullable();
            $table->string('email', 37)->nullable();
            $table->string('sex', 1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abonnes');
    }
}
