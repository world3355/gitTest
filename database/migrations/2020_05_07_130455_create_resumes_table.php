<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();//지원번호
            $table->float('score');//영상과제점수
            $table->text('message');//기타메시지
            $table->boolean('result')->default(0);//합격여부
            $table->timestamps();
            $table->unsignedBigInteger('user_id');//회원번호
            $table->unsignedBigInteger('audition_id');//오디션번호

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('audition_id')->references('id')->on('auditions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resumes');
    }
}
