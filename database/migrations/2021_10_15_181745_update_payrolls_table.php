<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('payrolls', 'dead_line')){
            Schema::table('payrolls', function (Blueprint $table){
                $table->dropColumn('dead_line');
            });
        }

        Schema::table('payrolls', function (Blueprint $table) {
            $table->dropColumn(['date']);
            $table->date('start_date');
            $table->date('dead_line');
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
