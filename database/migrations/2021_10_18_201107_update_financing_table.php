<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFinancingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('financing', function (Blueprint $table) {
            $table->unsignedBigInteger('payroll_employee_id')->nullable();
            $table->string('description')->nullable();

            $table->foreign('payroll_employee_id')->references('id')->on('payrolls_employee')->onDelete('cascade');
        });

        Schema::table('financing_payments', function (Blueprint $table) {
            $table->unsignedBigInteger('payroll_employee_id')->nullable();

            $table->foreign('payroll_employee_id')->references('id')->on('payrolls_employee')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
