<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('bar_code', 100);
            $table->string('product_name', 100);
            $table->unsignedBigInteger('productcategory_id');
            $table->float('units_in_case');
            $table->unsignedBigInteger('units_type');
            $table->float('cost_price', 10, 2);
            $table->float('sale_price', 10, 2)->nullable();
            $table->decimal('mrp', $precision = 10, $scale = 2);
            $table->decimal('vat', $precision = 10, $scale = 2)->default(0);
            $table->unsignedBigInteger('product_company_id')->nullable();
            $table->unsignedBigInteger('product_brand_id')->nullable();
            $table->boolean('product_status');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('productcategory_id')->references('id')->on('product_categories')->onDelete('cascade');
            $table->foreign('units_type')->references('id')->on('product_unit_types')->onDelete('cascade');
            $table->foreign('product_company_id')->references('id')->on('product_companies')->onDelete('cascade');
            $table->foreign('product_brand_id')->references('id')->on('product_brands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
