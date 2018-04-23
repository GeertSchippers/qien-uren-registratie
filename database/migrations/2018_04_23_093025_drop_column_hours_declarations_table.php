<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnHoursDeclarationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::table('hours_declarations', function (Blueprint $table) {
           $table->dropColumn('paid');
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
           $table->integer('paid');
       });
     }
}
