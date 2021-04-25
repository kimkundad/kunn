<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaidsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('get_users', function (Blueprint $table) {
            //
            $table->integer('first_n')->default('0');
            $table->string('age')->nullable();
            $table->string('study')->nullable();
            $table->string('novice')->nullable();
            $table->integer('salary')->default('0');
            $table->integer('sex')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('get_users', function (Blueprint $table) {
            //
            $table->dropColumn('first_n');
            $table->dropColumn('age');
            $table->dropColumn('study');
            $table->dropColumn('novice');
            $table->dropColumn('salary');
            $table->dropColumn('sex');
        });
    }
}
