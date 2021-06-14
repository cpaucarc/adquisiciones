<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArrivalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrivals', function (Blueprint $table) {
            $table->id();

            $table->timestamp('arrival_date');
            $table->unsignedBigInteger('origin');
            $table->unsignedBigInteger('destination');
            $table->unsignedBigInteger('document_id');
            $table->unsignedBigInteger('attention_status_id');

            $table->foreign('document_id')->references('id')->on('documents');
            $table->foreign('attention_status_id')->references('id')->on('attention_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arrivals');
    }
}
