<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWipAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wip_attachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wip_id');
            $table->string('title');
            $table->string('file_name');
            $table->text('file_path');
            $table->float('file_size', 10, 2)->nullable();
            $table->text('thumbnail_path')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('company_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('wip_id')->references('id')->on('wip')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wip_attachments');
    }
}
