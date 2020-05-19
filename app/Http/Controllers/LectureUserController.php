<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LectureUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $confirmCode = \App\Session::first();

        $user = \App\User::whereConfirmCode($confirmCode->confirm_code)->first();

        $accuracy = $request->accuracy;
        $user_id = $user->id;
        $lecture_id = $request->lecture_id;
        if($accuracy >= 85) {
            $clear = 1;
        } else {
            $clear = 0;
        }

        $score = \App\LectureUser::create([
            'accuracy' => $accuracy,
            'user_id' => $user_id,
            'lecture_id' => $lecture_id,
            'clear' => $clear,
        ]);

        return response()->json($score, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        return response()->json('수강 끝난 후 점수 데이터 추가', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
