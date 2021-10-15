<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBillTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bills', function (Blueprint $table) {
            $table->enum('tipo_pago', ['C', 'B'])->comment('C - Crypto, B - Bancolombia')->nullable();
            $table->string('billetera')->nullable();
            $table->string('bancolombia')->nullable();
            $table->string('comprobante')->nullable()->comment('Comprobante del pago');
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
