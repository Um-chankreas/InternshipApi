<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailToStudentRequestDadvisors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_request_dadvisors', function (Blueprint $table) {
            $table->string('student_email')->nullable();
            $table->string('advisor_email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_request_dadvisors', function (Blueprint $table) {
            //
        });
    }
}
