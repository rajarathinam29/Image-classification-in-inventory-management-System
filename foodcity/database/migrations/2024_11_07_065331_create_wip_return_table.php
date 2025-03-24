<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWipReturnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wip_return', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wip_id');
            $table->unsignedBigInteger('wip_stock_id');
            $table->unsignedBigInteger('wip_handover_id');
            $table->float('units');
            $table->date('return_date');
            $table->unsignedBigInteger('return_by');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('branch_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('wip_id')->references('id')->on('wip')->onDelete('cascade');
            $table->foreign('wip_stock_id')->references('id')->on('wip_stock')->onDelete('cascade');
            $table->foreign('wip_handover_id')->references('id')->on('wip_hand_over')->onDelete('cascade');
            $table->foreign('return_by')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wip_return');
    }
}
