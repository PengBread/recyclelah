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
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phoneNumber')->unique();
            $table->string('status')->default('active');
            $table->unsignedInteger('pointerID')->default(null)->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            
            $table->foreign('organizationID')
                ->references('organizationID')
                ->on('organizations')
                ->onDelete('set null');
            $table->foreign('pointerID')
                ->references('pointerID')
                ->on('map_pointers')
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
        Schema::dropIfExists('users');
    }
}
