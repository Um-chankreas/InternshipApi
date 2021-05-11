<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMakeAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('make_appointments', function (Blueprint $table) {
            $table->id();
            $table->String("meet_date")->nullable();
            $table->String("advisor_id")->nullable();
            $table->String("advisor_userid")->nullable();
            $table->String("student_id")->nullable();
            $table->String("student_userid")->nullable();
            $table->String("student_name")->nullable();
            $table->String("advisor_name")->nullable();
            $table->String("desciption")->nullable();
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
        Schema::dropIfExists('make_appointments');
    }
}
