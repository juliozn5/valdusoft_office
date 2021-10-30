<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->text('payment_id')->comment('Identificador o numero de referencia del pago')->nullable();
            $table->text('account')->comment('Cuenta o billetera a la que se realizó el pago');
            $table->double('discount_amount')->default(0)->nullable()->comment('Monto a descontar de la factura en caso de existir');
            $table->text('discount_description')->nullable()->comment('Concepto por el descuento agregado');
            $table->text('support')->nullable()->comment('Soporte o Comprobante del pago');
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
