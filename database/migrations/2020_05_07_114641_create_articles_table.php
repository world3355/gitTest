<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();//피드백 번호
            $table->string('title');//질문 제목
            $table->text('content');//질문 내용
            $table->string('video')->nullable();//첨부영상
            $table->text('answer')->nullable();//답변
            $table->date('answer_date')->nullable();//답변일자
            //$table->tinyInteger('grade')->nullable();//평점
            $table->timestamps();//신청일자
            $table->unsignedBigInteger('user_id');//질문자번호
            $table->unsignedBigInteger('expert_id')->nullable();//답변자번호//nullable()나중에 제거할 것

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('expert_id')->references('id')->on('experts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
