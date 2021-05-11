<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestDefensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_defenses', function (Blueprint $table) {
            $table->id();
            $table->string('student_userid')->nullable();
            $table->string('student_id')->nullable();
            $table->string('advisor_id')->nullable();
            $table->string('advisor_userid')->nullable();
            $table->string('advisor_name')->nullable();
            $table->string('student_name')->nullable();
            $table->string('student_email')->nullable();
            $table->string('advisor_email')->nullable();
            $table->string('status')->default('0');
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
        Schema::dropIfExists('request_defenses');
    }
}
