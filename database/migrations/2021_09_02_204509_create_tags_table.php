<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $date = date('Y-m-d H:i:s');

        DB::table('tags')->insert([
            ['name' => 'Apps', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Diseño Web', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Desarrollo Web', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Diseño Gráfico', 'created_at' => $date, 'updated_at' => $date]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}
