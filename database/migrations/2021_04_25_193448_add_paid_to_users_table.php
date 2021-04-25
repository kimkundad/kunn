<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaidToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->integer('first_n')->default('0');
            $table->string('age')->nullable();
            $table->string('study')->nullable();
            $table->string('novice')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('first_n');
            $table->dropColumn('age');
            $table->dropColumn('study');
            $table->dropColumn('novice');
            $table->dropColumn('fname');
            $table->dropColumn('lname');
            $table->dropColumn('salary');
            $table->dropColumn('sex');
        });
    }
}
