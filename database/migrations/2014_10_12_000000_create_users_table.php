<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('users', function (Blueprint $table) {
            $table->increments('userID')->unsignedBigInteger();
            $table->unsignedInteger('organizationID')->default(null)->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phoneNumber')->unique();
            $table->integer('points');
            $table->string('status')->default('active');
            $table->unsignedInteger('pointerID')->default(null)->nullable();
            $table->string('password');
            $table->boolean('isVerified')->default(0);
            $table->timestamps();
            
            $table->foreign('organizationID')
                ->references('organizationID')
                ->on('organizations')
                ->onDelete('set null');
            $table->foreign('pointerID')
                ->references('pointerID')
                ->on('map_pointers')
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
        Schema::dropIfExists('users');
    }
}