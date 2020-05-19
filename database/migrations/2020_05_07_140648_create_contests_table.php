<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contests', function (Blueprint $table) {
            $table->id();//경연영상번호
            $table->string('title');//경연영상제목
            $table->text('content');//경연영상내용
            $table->string('video');//경연동영상
            $table->string('image');//썸네일이미지
            $table->timestamps();//등록일
            $table->unsignedBigInteger('genre_id')->nullable();//장르번호

            $table->foreign('genre_id')->references('id')->on('genres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contests');
    }
}
