<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPasswordResetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('userPasswordReset', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('userID');
            $table->string('token')->unique();
            $table->datetime('used_At')->nullable();
            $table->datetime('created_At');
            $table->datetime('updated_At');
            $table->foreign('userID')
                ->references('userID')
                ->on('users')
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
        Schema::dropIfExists('password_reset');
    }
}
