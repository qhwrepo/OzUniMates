<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\University;

class CreateUniversitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public $timestamps = false;

    public function up()
    {
        Schema::create('universities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        //university list, preadded
        University::create([
            'name' => '还没有目标']);
        University::create([
            'name' => '其他']);
        University::create([
            'name' => '澳大利亚国立大学']);
        University::create([
            'name' => '墨尔本大学']);
        University::create([
            'name' => '悉尼大学']);
        University::create([
            'name' => '新南威尔士大学']);
        University::create([
            'name' => '莫纳什大学']);
        University::create([
            'name' => '昆士兰大学']);
        University::create([
            'name' => '西澳大学']);
        University::create([
            'name' => '阿德莱德大学']);
        University::create([
            'name' => '麦考瑞大学']);
        University::create([
            'name' => '格里菲思大学']);
        University::create([
            'name' => '墨尔本皇家理工学院']);
        University::create([
            'name' => '悉尼科技大学']);
        University::create([
            'name' => '迪肯大学']);
        University::create([
            'name' => '卧龙岗大学']);
        University::create([
            'name' => '维多利亚大学']);
        University::create([
            'name' => '斯威本科技大学']);
        University::create([
            'name' => '科廷科技大学']);
        University::create([
            'name' => '默多克大学']);
        University::create([
            'name' => '南澳大学']);
        University::create([
            'name' => '纽卡斯尔大学']);
        University::create([
            'name' => '查尔斯斯图亚特大学']);
        University::create([
            'name' => '拉筹伯大学']);
        University::create([
            'name' => '昆士兰科技大学']);
        University::create([
            'name' => '詹姆斯库克大学']);
        University::create([
            'name' => '其他']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('universities');
    }
}
