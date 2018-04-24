<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDefaultToHoursDeclarations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
        public function up()
        {
            Schema::table('hours_declarations', function (Blueprint $table) {
                $table->integer('status')->default(0)->change();
            });
        }

        public function down()
        {
            Schema::table('hours_declarations', function (Blueprint $table) {
                $table->integer('status')->default(null)->change();
            });
        }
}
