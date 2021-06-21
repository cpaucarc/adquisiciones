<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2)->default(0.0);
            $table->date('due_date_at')->nullable();
            $table->time('due_time_at');
            $table->timestamp('accepted_at')->nullable();

            $table->unsignedBigInteger('line_id');
            $table->unsignedBigInteger('contract_status_id')->default(13); //13:En espera

            $table->foreign('line_id')->references('id')->on('lines');
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
        Schema::dropIfExists('contracts');
    }
}
