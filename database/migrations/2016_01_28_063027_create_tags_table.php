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
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        //skills list, preadded
        Tag::create([
            'name' => 'evaluate']);
        Tag::create([
            'name' => 'recommend']);
        Tag::create([
            'name' => 'cvps']);
        Tag::create([
            'name' => 'major']);
        Tag::create([
            'name' => 'course']);
        Tag::create([
            'name' => 'settle']);
        Tag::create([
            'name' => 'social']);
        Tag::create([
            'name' => 'linkedin']);
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
