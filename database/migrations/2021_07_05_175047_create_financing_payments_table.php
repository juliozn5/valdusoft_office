<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancingPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financing_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('financing_id');
            $table->double('amount');
            $table->date('date');
            $table->timestamps();

            $table->foreign('financing_id')->references('id')->on('financing')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('financing_payments');
    }
}
