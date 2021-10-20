<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRenewalHostingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renewal_hostings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hosting_id')->comment("Todos los campos deben estar asociados a un id de hosting");
            $table->foreign('hosting_id')->references('id')->on('hostings')->onDelete('cascade');
            $table->double('renewal_price')->comment("Precio de la renovación");
            $table->integer('years')->comment("Años de la renovación");
            $table->date('create_date')->nullable()->comment("Fecha de la renovación");
            $table->date('expire_date')->nullable()->comment("Fecha de vencimiento");
            $table->enum('status', [0, 1])->default(0)->comment('0 - Inactivo, 1 - Activo');
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
        Schema::dropIfExists('renewal_hostings');
    }
}
