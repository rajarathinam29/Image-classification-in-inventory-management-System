<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchased_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_id')->nullable();
            $table->unsignedBigInteger('product_id');
            $table->float('units');
            $table->float('free')->default(0);
            $table->decimal('cost_price', $precision = 10, $scale = 2);
            $table->decimal('sale_price', $precision = 10, $scale = 2)->default(0);
            $table->decimal('mrp', $precision = 10, $scale = 2);
            $table->decimal('mrp_c', $precision = 10, $scale = 2)->default(0);
            $table->decimal('total', $precision = 10, $scale = 2);
            $table->date('expiry_date')->nullable();
            $table->boolean('expiry_status')->default(0);
            $table->boolean('price_status')->default(0);
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('branch_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('purchase_id')->references('id')->on('purchase')->onDelete('cascade');
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
        Schema::dropIfExists('purchased_products');
    }
}
