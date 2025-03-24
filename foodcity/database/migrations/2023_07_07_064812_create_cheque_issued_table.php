<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChequeIssuedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cheque_issued', function (Blueprint $table) {
            $table->id();
            $table->string('cheque_no');
            $table->dateTime('issue_date');
            $table->dateTime('effective_date');
            $table->decimal('amount', $precision = 10, $scale = 2);
            $table->string('payee_name');
            $table->text('refference');
            $table->string('issue_to');
            $table->unsignedBigInteger('issue_id')->nullable();
            $table->tinyInteger('cheque_status');
            $table->unsignedBigInteger('company_bank_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('branch_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('company_bank_id')->references('id')->on('company_bank_info')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cheque_issued');
    }
}
