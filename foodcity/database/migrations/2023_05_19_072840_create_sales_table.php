<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id');
            $table->datetime('invoice_date');
            $table->datetime('credit_date')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->tinyInteger('sales_status');
            $table->boolean('discount_type')->default(0);
            $table->decimal('discount', $precision = 10, $scale = 2)->default(0);
            $table->decimal('shipping_cost', $precision = 10, $scale = 2)->default(0);
            $table->string('tracking_code')->nullable();
            $table->datetime('shipping_date')->nullable();
            $table->unsignedBigInteger('rtn_bill_id')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('branch_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('rtn_bill_id')->references('id')->on('sales')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
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
        Schema::dropIfExists('sales');
    }
}
