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
            $table->boolean('status')->default(0);
            $table->unsignedBigInteger('contract_id');
            $table->unsignedBigInteger('status_id');

            $table->foreign('contract_id')->references('id')->on('contracts');
            $table->foreign('status_id')->references('id')->on('statuses');
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
