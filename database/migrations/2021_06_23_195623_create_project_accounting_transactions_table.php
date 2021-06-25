<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectAccountingTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_accounting_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->string('description');
            $table->enum('type', ['+', '-'])->comment('+ - Ingreso, - Egreso');
            $table->double('amount');
            $table->double('balance')->default(0);
            $table->date('date');
            $table->enum('status', [0, 1])->default(0)->comment('0 - Pendiente, 1 - Completada');
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_accounting_transactions');
    }
}
