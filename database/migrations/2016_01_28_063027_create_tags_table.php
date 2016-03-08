<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Tag;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public $timestamps = false;

    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        //skills list, preadded
        Tag::create([
            'name' => '评估申请人背景']);
        Tag::create([
            'name' => '推荐院校']);
        Tag::create([
            'name' => '修改CV/PS']);
        Tag::create([
            'name' => '专业方向']);
        Tag::create([
            'name' => '选课指导']);
        Tag::create([
            'name' => '接机/找住宿']);
        Tag::create([
            'name' => '社交圈']);
        Tag::create([
            'name' => '职业圈']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tags');
    }
}
