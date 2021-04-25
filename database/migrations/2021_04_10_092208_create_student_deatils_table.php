<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentDeatilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_deatils', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('userid');
            $table->String('room')->nullable();
            $table->String('generate')->nullable();
            $table->String('defensedate')->nullable();
            $table->String('fromtime')->nullable();
            $table->String('totime')->nullable();
            $table->String('topic')->nullable();
            $table->String('company')->nullable();
            $table->String('advisor')->nullable();
            $table->string('studentid')->nullable();
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
        Schema::dropIfExists('student_deatils');
    }
}
