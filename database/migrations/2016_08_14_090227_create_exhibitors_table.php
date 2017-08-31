<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExhibitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exhibitors', function (Blueprint $table) {
            $table->increments('exhibitorID');
            $table->string('exhibitorName');
            $table->string('exhibitorAddress');
            $table->string('exhibitorWeb');
            $table->string('exhibitorEmail');

            $table->string('exhibitorContact');
            $table->integer('eventId');
            $table->dateTime('registeredDate');
            $table->char('status',1)->default('1');

            $table->char('deleted')->default('0');
            $table->rememberToken();
            $table->timestamps();
            $table->string('exhibitorLogo');
            $table->string('exhibitorMarketingDoc');
			
	    $table->foreign('eventId')->references('eventId')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('exhibitors');
    }
}
