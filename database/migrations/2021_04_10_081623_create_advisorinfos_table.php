<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvisorinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advisorinfos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('major')->nullable();
            $table->string('type')->nullable();
            $table->string('advisorId')->nullable();
            $table->String('phone')->nullable();
            $table->String('skill')->nullable();
            $table->String('advise')->nullable();
            $table->String('mcacc')->nullable();
            $table->String('tech')->nullable();
            $table->String('userid')->nullable();
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
        Schema::dropIfExists('advisorinfos');
    }
}
