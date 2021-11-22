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
            $table->string('token');
            $table->datetime('used_at')->nullable();
            $table->timestamp('requested_at');
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
