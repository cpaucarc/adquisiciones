<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();

            $table->string('link');
            $table->string('name');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('log_contract_status_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('log_contract_status_id')->references('id')->on('log_contract_statuses');
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
        Schema::dropIfExists('documents');
    }
}
