<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWipStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wip_stock', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wip_parts_received_id');
            $table->unsignedBigInteger('product_id');
            $table->float('units');
            $table->float('free')->default(0);
            $table->decimal('cost_price', $precision = 10, $scale = 2);
            $table->decimal('sale_price', $precision = 10, $scale = 2)->default(0);
            $table->decimal('mrp', $precision = 10, $scale = 2);
            $table->decimal('total', $precision = 10, $scale = 2);
            $table->date('expiry_date')->nullable();
            $table->boolean('expiry_status')->default(0);
            $table->boolean('price_status')->default(0);
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('branch_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('wip_parts_received_id')->references('id')->on('wip_parts_received')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('wip_stock');
    }
}
