<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('branch_name');
            $table->string('phone_no', 15);
            $table->string('email');
            $table->string('building_no')->nullable();
            $table->string('street');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('zipcode')->nullable();
            $table->text('description')->nullable();
            $table->boolean('status');
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('branches');
    }
}
