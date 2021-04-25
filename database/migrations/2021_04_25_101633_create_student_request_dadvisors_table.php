<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRequestDadvisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_request_dadvisors', function (Blueprint $table) {
            $table->id();
            $table->string("advisor_id");
            $table->string('advisor_user_id');
            $table->string("advisor_name");
            $table->string('student_name');
            $table->string('student_id');
            $table->string('student_user_id');
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
        Schema::dropIfExists('student_request_dadvisors');
    }
}
