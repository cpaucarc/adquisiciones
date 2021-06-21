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

            $table->timestamp('arrival_date')->useCurrent();
            $table->text('feedback')->nullable();
            $table->unsignedBigInteger('origin');
            $table->unsignedBigInteger('destination');
            $table->unsignedBigInteger('log_contract_status_id');
            $table->unsignedBigInteger('attention_status_id');

            $table->foreign('log_contract_status_id')->references('id')->on('log_contract_statuses');
            $table->foreign('attention_status_id')->references('id')->on('attention_statuses');
            $table->timestamps();
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
