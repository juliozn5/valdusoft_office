<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('slug');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->date('birthdate')->nullable();
            $table->date('admission_date')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('position', [0, 1, 2, 3])->nullable()->comment('0 - Desarrollador, 1 - Diseñador, 2 - Project-Manager, 3 - Financiero');
            $table->unsignedBigInteger('profile_id')->default(0)->comment('0 - Nuevo, 1 - Administrador, 2 - Cliente, 3 - Trabajador');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('profile_id')->references('id')->on('profiles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
