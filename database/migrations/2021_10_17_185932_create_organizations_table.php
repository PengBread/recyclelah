<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::disableForeignKeyConstraints();

        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('organizationID')->unsigned();
            $table->unsignedInteger('userID');
            $table->string('organizationName')->unique();
            $table->string('organizationCode')->unique();
            $table->foreign('userID')
                ->references('userID')
                ->on('users')
                ->onDelete('set null');
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
        Schema::dropIfExists('organizations');
    }
}
