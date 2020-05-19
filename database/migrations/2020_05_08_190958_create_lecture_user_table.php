<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLectureUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecture_user', function (Blueprint $table) {
            $table->id();//수강번호
            $table->float('accuracy', 8, 2)->default(0);//정확도
            $table->boolean('clear')->default(0);//수료여부
            $table->timestamps();//수강일시
            $table->unsignedBigInteger('user_id');//회원번호
            $table->unsignedBigInteger('lecture_id');//강의영상번호

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('lecture_id')->references('id')->on('lectures');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lecture_user');
    }
}
