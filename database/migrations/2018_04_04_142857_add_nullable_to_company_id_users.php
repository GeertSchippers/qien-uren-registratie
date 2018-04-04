<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullableToCompanyIdUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
        public function up()
        {
            Schema::table('users', function (Blueprint $table) {
                $table->unsignedInteger('company_id')->nullable()->change();
            });
        }

        public function down()
        {
            Schema::table('users', function (Blueprint $table) {
                $table->unsignedInteger('company_id')->nullable(false)->change();
            });
        }
}
