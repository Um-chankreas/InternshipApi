<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStundentNameToJuryscoreReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('juryscore_reports', function (Blueprint $table) {
            $table->string('stundentName')->nullable();
            $table->string('studentid')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('juryscore_reports', function (Blueprint $table) {
            //
        });
    }
}
