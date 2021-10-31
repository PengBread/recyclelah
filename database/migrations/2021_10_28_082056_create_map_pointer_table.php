<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapPointerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('map_pointers', function (Blueprint $table) {
            $table->increments('pointerID')->unsigned();
            // $table->unsignedInteger('scheduleID');
            $table->double('longitude');
            $table->double('latitude');
            $table->string('pointerAddress');
            $table->string('pointerStatus')->default('inactive');
            $table->datetime('arrived_At');
            $table->datetime('confirmed_At');
            $table->string('recycleCategory')->default('Paper');
            // $table->foreign('scheduleID')
            //     ->references('scheduleID')
            //     ->on('schedules')
            //     ->onDelete('set null');
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
        Schema::dropIfExists('map_pointers');
    }
}
