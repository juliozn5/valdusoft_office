<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('profile');
            $table->timestamps();
        });

        $date = date('Y-m-d H:i:s');

        DB::table('profiles')->insert([
            ['profile' => 'admin', 'created_at' => $date, 'updated_at' => $date],
            ['profile' => 'client', 'created_at' => $date, 'updated_at' => $date],
            ['profile' => 'employee', 'created_at' => $date, 'updated_at' => $date]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
