<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->id();//강의영상번호
            $table->string('title');//강의영상제목
            $table->text('content');//강의영상내용
            $table->string('video');//강의동영상
            $table->string('image');//강의썸네일이미지
            $table->timestamps();//강의등록일
            $table->unsignedBigInteger('genre_id')->nullable();//장르번호
            $table->unsignedBigInteger('level_id')->nullable();//난이도번호

            $table->foreign('genre_id')->references('id')->on('genres');
            $table->foreign('level_id')->references('id')->on('levels');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lectures');
    }
}
