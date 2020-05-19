<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MypageController extends Controller
{
    public function loadProfile()
    {
        $confirmCode = \App\Session::first();

        $user = \App\User::whereConfirmCode($confirmCode->confirm_code)->first();

        if($user->class == 1) {
            $result = \App\User::join('ranks','rank_id','=','ranks.id')
            ->whereConfirmCode($confirmCode->confirm_code)->first();
        } else if($user->class == 2) {
            $result = \App\User::join('ranks','rank_id','=','ranks.id')
            ->join('experts','expert_id','=','experts.id')
            ->join('specialties','specialty_id','=','specialties.id')
            ->join('companies','expert_company_id','=','companies.id')
            ->whereConfirmCode($confirmCode->confirm_code)->first();
        } else {
            $result = \App\User::join('ranks','rank_id','=','ranks.id')
            ->join('companies','company_id','=','companies.id')
            ->whereConfirmCode($confirmCode->confirm_code)->first();           
        }

        return response()->json($result, 200);
        
    }

    public function loadMyLecture() {

        $confirmCode = \App\Session::first();

        $user = \App\User::whereConfirmCode($confirmCode->confirm_code)->first();

        $result = \App\LectureUser::join('lectures','lecture_id','=','lectures.id')
        ->whereUserId($user->id)->get();

        return response()->json($result, 200);
    }

    public function loadMyResume() {
        $confirmCode = \App\Session::first();

        $user = \App\User::whereConfirmCode($confirmCode->confirm_code)->first();

        $result = \App\User::orderBy('id', 'desc')->find($user->id)->resumes()
        ->join('auditions','audition_id','=','auditions.id')->get();

        return response()->json($result, 200);
    }

    public function loadMyAudition() {
        $confirmCode = \App\Session::first();

        $user = \App\User::whereConfirmCode($confirmCode->confirm_code)->first();

        $result = \App\User::find($user->id)->auditions()->get();

        return response()->json($result, 200);
    }

    public function updateProfile() {
        $confirmCode = \App\Session::first();

        $user = \App\User::whereConfirmCode($confirmCode->confirm_code)->first();

        $result = \App\User::find($user->id)->update([
            //내용내용
        ]);

        return response()->json($result, 200);
    }
}
