<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoredetailsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->boolean('price_type')->default(0)->after('units_type');
            $table->float('profit_margin')->after('price_type');
            $table->text('description')->nullable()->after('product_status');
            $table->float('alert_qty')->nullable()->after('units_in_case');
            $table->boolean('vat_type')->default(0)->after('vat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('price_type');
            $table->dropColumn('profit_margin');
            $table->dropColumn('description');
            $table->dropColumn('alert_qty');
            $table->dropColumn('vat_type');
        });
    }
}
