<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStockIdSalesProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales_products', function (Blueprint $table) {
            $table->unsignedBigInteger('stock_id')->nullable()->after('product_id');

            $table->foreign('stock_id')->references('id')->on('purchased_products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales_products', function (Blueprint $table) {
            $table->dropForeign(['stock_id']);
            $table->dropColumn('stock_id');
        });
    }
}
