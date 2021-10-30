<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechnologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technologies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $date = date('Y-m-d H:i:s');
        
        DB::table('technologies')->insert([
            ['name' => 'PHP', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Laravel', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'HTML5', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Javascript', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'JQuery', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'VueJS', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'AngularJS', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Ionic', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'CSS', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Bootstrap', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Uikit', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'MySQL', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'PostgreSQL', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'SQL Server', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Oracle', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'WordPress', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'AJAX', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Amazon Web Services (AWS)', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Google Maps', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Android', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Flutter', 'created_at' => $date, 'updated_at' => $date]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('technologies');
    }
}
