<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWipPartsReceivedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wip_parts_received', function (Blueprint $table) {
            $table->id();
            $table->string('grn_no');
            $table->dateTime('date');
            $table->string('invoice_no', 50)->nullable();
            $table->unsignedBigInteger('suppliers_id');
            $table->unsignedBigInteger('wip_id');
            $table->unsignedBigInteger('order_id')->nullable();
            $table->decimal('total_amount', 10, 2);
            $table->decimal('discount', 10, 2)->default(0);
            $table->decimal('cost', 10, 2)->default(0);
            $table->boolean('received_status')->default(0);
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('suppliers_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->foreign('wip_id')->references('id')->on('wip')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('purchase_order')->onDelete('cascade');
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
        Schema::dropIfExists('wip_parts_received');
    }
}
