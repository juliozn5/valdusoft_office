<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('skill');
            $table->timestamps();
        });

        $date = date('Y-m-d H:i:s');

        DB::table('skills')->insert([
            ['skill' => 'PHP', 'created_at' => $date, 'updated_at' => $date],
            ['skill' => 'Laravel', 'created_at' => $date, 'updated_at' => $date],
            ['skill' => 'HTML5', 'created_at' => $date, 'updated_at' => $date],
            ['skill' => 'Javascript', 'created_at' => $date, 'updated_at' => $date],
            ['skill' => 'JQuery', 'created_at' => $date, 'updated_at' => $date],
            ['skill' => 'VueJS', 'created_at' => $date, 'updated_at' => $date],
            ['skill' => 'AngularJS', 'created_at' => $date, 'updated_at' => $date],
            ['skill' => 'Ionic', 'created_at' => $date, 'updated_at' => $date],
            ['skill' => 'CSS', 'created_at' => $date, 'updated_at' => $date],
            ['skill' => 'Bootstrap', 'created_at' => $date, 'updated_at' => $date],
            ['skill' => 'Uikit', 'created_at' => $date, 'updated_at' => $date],
            ['skill' => 'MySQL', 'created_at' => $date, 'updated_at' => $date],
            ['skill' => 'PostgreSQL', 'created_at' => $date, 'updated_at' => $date],
            ['skill' => 'SQL Server', 'created_at' => $date, 'updated_at' => $date],
            ['skill' => 'Oracle', 'created_at' => $date, 'updated_at' => $date],
            ['skill' => 'Git', 'created_at' => $date, 'updated_at' => $date],
            ['skill' => 'WordPress', 'created_at' => $date, 'updated_at' => $date],
            ['skill' => 'Diseno Web', 'created_at' => $date, 'updated_at' => $date],
            ['skill' => 'AJAX', 'created_at' => $date, 'updated_at' => $date],
            ['skill' => 'Amazon Web Services (AWS)', 'created_at' => $date, 'updated_at' => $date],
            ['skill' => 'Google Maps', 'created_at' => $date, 'updated_at' => $date],
            ['skill' => 'Programación Web', 'created_at' => $date, 'updated_at' => $date],
            ['skill' => 'Programación Móvil', 'created_at' => $date, 'updated_at' => $date],
            ['skill' => 'Android', 'created_at' => $date, 'updated_at' => $date],
            ['skill' => 'Flutter', 'created_at' => $date, 'updated_at' => $date]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skills');
    }
}
