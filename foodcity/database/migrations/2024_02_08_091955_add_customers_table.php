<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->float('credit_limit')->default(0)->after('points');
            $table->string('alt_phone_no', 15)->after('phone_no');
            $table->string('shipping_building_no')->nullable()->after('credit_limit');
            $table->string('shipping_street')->nullable()->after('shipping_building_no');
            $table->string('shipping_city')->nullable()->after('shipping_street');
            $table->string('shipping_state')->nullable()->after('shipping_city');
            $table->string('shipping_country')->nullable()->after('shipping_state');
            $table->string('shipping_zipcode')->nullable()->after('shipping_country');
            $table->string('tax_no')->nullable()->after('shipping_zipcode');
            $table->string('pay_term')->nullable()->after('tax_no');
            $table->string('pay_type')->nullable()->after('pay_term');
            $table->date('date_of_birth')->nullable()->after('last_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('credit_limit');
            $table->dropColumn('alt_phone_no', 15);
            $table->dropColumn('shipping_building_no');
            $table->dropColumn('shipping_street');
            $table->dropColumn('shipping_city');
            $table->dropColumn('shipping_state');
            $table->dropColumn('shipping_country');
            $table->dropColumn('shipping_zipcode');
            $table->dropColumn('tax_no');
            $table->dropColumn('pay_term');
            $table->dropColumn('pay_type');
            $table->dropColumn('date_of_birth');
        });
    }
}
