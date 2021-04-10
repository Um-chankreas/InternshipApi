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
            $table->String('presentation_skill');
            $table->String('content_org');
            $table->String('demonstration_and_question');
            $table->String('impression');
            $table->String('comment');
            $table->String('examiner');
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
