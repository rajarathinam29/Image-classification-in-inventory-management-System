<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCurrencyInfoCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->integer('starting_month')->default(1)->after('status');
            $table->unsignedBigInteger('currency_id')->nullable()->after('starting_month');
            $table->string('currency_placement')->default('before')->after('currency_id');

            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropForeign(['currency_id']);
            $table->dropColumn('starting_month');
            $table->dropColumn('currency_id');
            $table->dropColumn('currency_placement');
        });
        
    }
}
