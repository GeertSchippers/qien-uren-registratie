<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPasswordAndRememberTokenToCompanies extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
       Schema::table('companies', function (Blueprint $table) {
           $table->string('password',255);
           $table->string('remember_token',100)->nullable();
       });
   }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
   public function down()
   {
       Schema::table('companies', function (Blueprint $table) {
          $table->drop('password');
          $table->drop('remember_token');
       });
   }
}
