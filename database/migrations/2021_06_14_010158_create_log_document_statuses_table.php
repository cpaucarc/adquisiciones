<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogDocumentStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_document_statuses', function (Blueprint $table) {
            $table->id();

            $table->dateTime('update_at')->useCurrent();
            $table->unsignedBigInteger('document_status_id');
            $table->unsignedBigInteger('document_id');

            $table->foreign('document_status_id')->references('id')->on('document_statuses');
            $table->foreign('document_id')->references('id')->on('documents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_document_statuses');
    }
}
