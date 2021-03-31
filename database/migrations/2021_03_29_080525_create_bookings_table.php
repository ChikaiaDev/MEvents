<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');
            $table->timestamp('event_date');
            $table->string('event_location');
            $table->unSignedBigInteger('user_id');
            $table->unSignedBigInteger('event_id');
            $table->timestamps();
        });
        Schema::table('booking', function(Blueprint $table)
        {
            $table->foreign('event_name')->references('name')->on('events')->onDelete('cascade');
            $table->foreign('event_date')->references('date')->on('events')->onDelete('cascade');
            $table->foreign('event_location')->references('location')->on('events')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });
   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking');
    }
}
