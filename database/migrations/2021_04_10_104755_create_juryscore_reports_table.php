<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuryscoreReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juryscore_reports', function (Blueprint $table) {
            $table->id();
            $table->String('presentation_skill')->nullable();
            $table->String('content_org')->nullable();
            $table->String('demonstration_and_question')->nullable();
            $table->String('impression')->nullable();
            $table->String('comment')->nullable();
            $table->String('examiner')->nullable();
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
        Schema::dropIfExists('juryscore_reports');
    }
}
