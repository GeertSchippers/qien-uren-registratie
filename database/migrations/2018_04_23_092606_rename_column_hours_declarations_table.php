<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnHoursDeclarationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::table('hours_declarations', function(Blueprint $table)
       {
           $table->renameColumn('approved', 'status');
       });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
       Schema::table('hours_declarations', function(Blueprint $table)
       {
           $table->renameColumn('status', 'approved');
       });
     }
}
