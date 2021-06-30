<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bills', function (Blueprint $table) {
            $table->enum('type', ['C', 'E', 'H'])->comment('C - Cliente, E - Empleado, H - Hosting');
            $table->unsignedBigInteger('hosting_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable()->change();

            $table->foreign('hosting_id')->references('id')->on('hostings');
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
