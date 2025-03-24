<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNoteDatePurchaseProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchased_products', function (Blueprint $table) {
            $table->text('note')->nullable()->after('price_status');
            $table->date('receive_date')->nullable()->after('note');
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
            $table->dropColumn('note');
            $table->dropColumn('receive_date');
        });
    }
}
