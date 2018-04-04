<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrenDeclaratieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uren_declaratie', function (Blueprint $table) {
            $table->increments('id');
            $table->date('datum');
            $table->integer('aantal');
            $table->string('type');
            $table->string('verklaring');
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
        Schema::drop('uren_declaratie');
    }
}
