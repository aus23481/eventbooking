<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpositionstandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expositionstands', function (Blueprint $table) {
            
            $table->increments('expositonStandId');
            $table->integer('exhibitorId');
            $table->integer('eventId');
            $table->string('exhibitorName');
            $table->string('standStatus');
            $table->string('standPrice');
            $table->double('standType');
            $table->string('standPic');
           
            $table->timestamps();
            $table->foreign('eventId')->references('eventId')->on('events')->onDelete('cascade');
            $table->foreign('exhibitorId')->references('exhibitorID')->on('exhibitors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('expositionstands');
    }
}
