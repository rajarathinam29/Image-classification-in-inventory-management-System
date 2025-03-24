<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTransferIdPurchaseProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchased_products', function (Blueprint $table) {
            $table->unsignedBigInteger('transfer_id')->nullable()->after('purchase_id');

            $table->foreign('transfer_id')->references('id')->on('stock_transfer')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchased_products', function (Blueprint $table) {
            $table->dropForeign(['transfer_id']);
            $table->dropColumn('transfer_id');
        });
    }
}
