<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddApprovedToDeclarations extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
       Schema::table('declarations', function (Blueprint $table) {
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
       Schema::table('declarations', function (Blueprint $table) {
          $table->drop('approved');
       });
   }
}
