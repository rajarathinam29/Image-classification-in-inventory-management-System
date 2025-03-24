<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('title', 5);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_no', 15);
            $table->string('email')->nullable();;
            $table->string('building_no')->nullable();
            $table->string('street');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('zipcode')->nullable();
            $table->float('points')->default(0);
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
