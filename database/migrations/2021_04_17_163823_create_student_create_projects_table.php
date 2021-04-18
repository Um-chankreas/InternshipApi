<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentCreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_create_projects', function (Blueprint $table) {
            $table->id();
            $table->String("name");
            $table->String("email");
            $table->string("phone");
            $table->string("status");
            $table->string("position");
            $table->string("technologies");
            $table->string("topic");
            $table->string("descriptions");
            $table->string("supervisor");
            $table->string("sup_email");
            $table->string("company");
            $table->string("com_add");
            $table->string("computer");
            $table->string("desk");
            $table->string("start_date");
            $table->string("agr_status");
            $table->string("advisor");
            $table->string('userId');
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
        Schema::dropIfExists('student_create_projects');
    }
}
