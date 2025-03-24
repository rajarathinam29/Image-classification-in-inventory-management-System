<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStockIdTransferProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stock_transfer_products', function (Blueprint $table) {
            $table->unsignedBigInteger('wip_stock_id')->nullable()->after('transfer_id');

            $table->foreign('wip_stock_id')->references('id')->on('wip_stock')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stock_transfer_products', function (Blueprint $table) {
            $table->dropForeign(['wip_stock_id']);
            $table->dropColumn('wip_stock_id');
        });
    }
}
