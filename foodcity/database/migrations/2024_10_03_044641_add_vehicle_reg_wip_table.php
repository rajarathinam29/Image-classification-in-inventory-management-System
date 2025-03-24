<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVehicleRegWipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wip', function (Blueprint $table) {
            $table->unsignedBigInteger('vehicle_reg_id')->nullable()->after('customer_id');

            $table->foreign('vehicle_reg_id')->references('id')->on('vehicle_reg_no')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wip', function (Blueprint $table) {
            $table->dropForeign(['vehicle_reg_id']);
            $table->dropColumn('vehicle_reg_id');
        });
    }
}
