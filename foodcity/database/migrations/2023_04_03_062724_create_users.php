<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('title', 5);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_no', 15);
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('user_name')->unique();
            $table->string('password')->nullable();
            $table->string('building_no')->nullable();
            $table->string('street');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('zipcode')->nullable();
            $table->unsignedBigInteger('role_id');
            $table->boolean('status');
            $table->text('token')->nullable();
            $table->datetime('last_login')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('role_id')->references('id')->on('user_role')->onDelete('cascade');
        });
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
