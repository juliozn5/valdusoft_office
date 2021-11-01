<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCpanelToHostings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hostings', function (Blueprint $table) {
            $table->longText('cpanel_url')->nullable()->after('renewal_hosting');
            $table->string('cpanel_email')->nullable()->after('cpanel_url');
            $table->string('cpanel_password')->nullable()->after('cpanel_email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hostings', function (Blueprint $table) {
            //
        });
    }
}