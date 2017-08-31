<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('eventId');
            $table->string('eventName');
            $table->dateTime('eventStartDate');
			$table->dateTime('eventEndDate');
			$table->string('eventAddress');
			
			$table->string('eventContactMail');
            $table->string('eventPhone');
			$table->string('eventSponsoredBy');
			$table->string('eventOrganizedBy');
			
			$table->string('eventLocationLat');
			$table->string('eventLocationLong');
			$table->integer('seatsQuantity');
            $table->rememberToken();
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
        Schema::drop('events');
    }
}
