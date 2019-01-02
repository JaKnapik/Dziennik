<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Dziennik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function(Blueprint $table)
        {
            $table->increments('osobaID');
            $table->string('pesel');
            $table->string('imie');
            $table->string('nazwisko');
            $table->string('haslo');
            $table->string('rola');
            $table->string('modyfikatorID');
            $table->string('oddzial');
            $table->string('tymczasowe');
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
        //
    }
}
