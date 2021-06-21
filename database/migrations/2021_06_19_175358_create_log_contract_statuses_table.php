<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogContractStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_contract_statuses', function (Blueprint $table) {
            $table->id();

            $table->boolean('status')->default(false);
            $table->unsignedBigInteger('contract_id');
            $table->unsignedBigInteger('contract_status_id');

            $table->foreign('contract_id')->references('id')->on('contracts');
            $table->foreign('contract_status_id')->references('id')->on('contract_statuses');

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
        Schema::dropIfExists('log_contract_statuses');
    }
}
