<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Presence extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presence', function (Blueprint $table) {
            $table->increments('presenceID');
            $table->boolean('presence');
            $table->string('subject');
            $table->dateTime('date');
            $table->string('description');
            $table->integer('addedBy')->unsigned();
            $table->integer('editedBy')->unsigned();
            $table->foreign('addedBy')->references('id')->on('users');
            $table->foreign('editedBy')->references('id')->on('users');
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
