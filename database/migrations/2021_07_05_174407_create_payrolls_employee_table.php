<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollsEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls_employee', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payroll_id');
            $table->unsignedBigInteger('user_id');
            $table->double('price_by_hour');
            $table->double('total_hours');
            $table->double('total_amount');
            $table->date('date');
            $table->enum('status', [0, 1])->default(0)->comment('0 - Pendiente, 1 - Completada');
            $table->timestamps();

            $table->foreign('payroll_id')->references('id')->on('payrolls');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payrolls_employee');
    }
}
