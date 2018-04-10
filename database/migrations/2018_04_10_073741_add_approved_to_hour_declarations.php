<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddApprovedToHourDeclarations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::table('hours_declarations', function (Blueprint $table) {
             $table->integer('approved')->default(0);
         });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
         Schema::table('hours_declarations', function (Blueprint $table) {
            $table->drop('approved');
         });
     }
}
