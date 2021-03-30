<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('start_event_date')->nullable();
            $table->string('end_event_date')->nullable();
            $table->string('start_event_time')->nullable();
            $table->string('location')->nullable();
            $table->string('name_address')->nullable();
            $table->string('address')->nullable();
            $table->text('image')->nullable();
            $table->text('detail')->nullable();
            $table->integer('type')->default('0');
            $table->integer('ex_id')->default('0');
            $table->integer('total')->default('0');
            $table->integer('status')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
