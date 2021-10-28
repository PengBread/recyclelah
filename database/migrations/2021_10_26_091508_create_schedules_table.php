<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('scheduleID')->unsigned();
            //$table->unsignedInteger('userID');
            $table->string('scheduleName');
            $table->string('scheduleDate');
            $table->string('scheduleTimeStart');
            $table->string('scheduleTimeEnd');
            $table->boolean('scheduleStatus');
            $table->mediumText('scheduleContent');
            $table->string('recyclingCatagory');
            $table->string('stateName');
            //table->onUpdate('cascade')->onDelete('cascade');
            
            //$table->foreign('organizationID')
                //->references('organizationID')
               // ->on('organizations')
                //->onDelete('cascade')
               // ->onUpdate('cascade');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}