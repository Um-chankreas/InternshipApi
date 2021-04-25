<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoomToStudentCreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_create_projects', function (Blueprint $table) {
            $table->String('room')->nullable();;
            $table->String('generate')->nullable();;
            $table->String('defensedate')->nullable();;
            $table->String('fromtime')->nullable();;
            $table->String('totime')->nullable();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_create_projects', function (Blueprint $table) {
            //
        });
    }
}
