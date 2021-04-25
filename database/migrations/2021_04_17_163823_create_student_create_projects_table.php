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
            $table->string("phone")->nullable();
            $table->string("status")->nullable();
            $table->string("position")->nullable();
            $table->string("technologies")->nullable();
            $table->string("topic")->nullable();
            $table->string("descriptions")->nullable();
            $table->string("supervisor")->nullable();
            $table->string("sup_email")->nullable();
            $table->string("company")->nullable();
            $table->string("com_add")->nullable();
            $table->string("computer")->nullable();
            $table->string("desk")->nullable();
            $table->string("start_date")->nullable();
            $table->string("agr_status")->nullable();
            $table->string("advisor")->nullable();
            $table->string('userId')->nullable();
            $table->string('schedule_status')->default('0');
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
