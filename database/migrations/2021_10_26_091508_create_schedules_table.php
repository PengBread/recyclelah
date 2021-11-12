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
            $table->unsignedInteger('organizationID');
            $table->string('scheduleName');
            $table->timestamp('scheduleDateStart');
            $table->timestamp('scheduleDateEnd');
            $table->boolean('scheduleStatus');
            $table->mediumText('scheduleContent');
            $table->string('recyclingCategory');
            $table->string('stateName');
            $table->foreign('organizationID')
                ->references('organizationID')
                ->on('organizations')
                ->onDelete('cascade');
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
