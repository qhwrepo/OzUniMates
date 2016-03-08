<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Major;

class CreateMajorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public $timestamps = false;

    public function up()
    {
        Schema::create('majors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        //major list, preadded
        Major::create([
            'name' => '其他']);
        Major::create([
            'name' => '商科']);
        Major::create([
            'name' => '工程/计算机']);
        Major::create([
            'name' => '自然科学']);
        Major::create([
            'name' => '医学']);
        Major::create([
            'name' => '法学']);
        Major::create([
            'name' => '人文/社会']);
        Major::create([
            'name' => '艺术']);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('majors');
    }
}
