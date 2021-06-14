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

            $table->string('name', 75);
            $table->text('description');
            $table->decimal('price', 10, 2)->default('0.0');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('due_at')->nullable();
            $table->timestamp('accepted_at')->nullable();
            $table->unsignedBigInteger('line_id');

            $table->foreign('line_id')->references('id')->on('lines');
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
