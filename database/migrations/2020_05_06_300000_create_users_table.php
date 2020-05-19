<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();//회원번호
            $table->string('userid')->unique();//아이디
            $table->string('password');//비밀번호
            $table->string('name');//회원이름
            $table->string('image')->nullable();//프로필사진
            $table->date('birthday')->nullable();//생년월일
            $table->boolean('gender')->nullable();//성별
            $table->string('address');//주소
            $table->string('call_number');//연락처
            $table->text('introduction')->nullable();//자기소개
            $table->tinyInteger('class')->default(1);//등급구분
            $table->timestamps();
            $table->timestamp('last_login')->nullable();
            $table->string('confirm_code', 60)->nullable();	
            $table->unsignedBigInteger('rank_id')->default(1);//랭크번호
            $table->unsignedBigInteger('company_id')->nullable();//기업번호
            $table->unsignedBigInteger('expert_id')->nullable();//전문가번호
            
            $table->foreign('rank_id')->references('id')->on('ranks');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('expert_id')->references('id')->on('experts');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
