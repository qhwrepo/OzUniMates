<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentUniversityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public $timestamps = false;

    public function up()
    {
        Schema::create('student_university', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('student_id')->unsigned()->index();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->integer('university_id')->unsigned()->index();
            $table->foreign('university_id')->references('id')->on('universities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('student_university');
    }
}
