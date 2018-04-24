<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIncludeToDeclarations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
   {
       Schema::table('declarations', function (Blueprint $table) {
           $table->string('include')->nullable();
       });
   }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
   public function down()
   {
       Schema::table('declarations', function (Blueprint $table) {
          $table->dropColumn('include');
       });
   }
}
