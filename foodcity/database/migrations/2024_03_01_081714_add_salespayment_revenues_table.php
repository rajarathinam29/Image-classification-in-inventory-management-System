<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSalespaymentRevenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('revenues', function (Blueprint $table) {
            $table->unsignedBigInteger('sales_payment_id')->nullable()->after('type_id');

            $table->foreign('sales_payment_id')->references('id')->on('sales_payments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('revenues', function (Blueprint $table) {
            $table->dropForeign(['sales_payment_id']);
            $table->dropColumn('sales_payment_id');
        });
    }
}
