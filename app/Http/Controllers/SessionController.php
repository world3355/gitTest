<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $confirmCode = \App\Session::first();

        if($confirmCode) {
            return response()->json(false, 200);
        }
        return response()->json(true, 200);
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
        if(!auth()->attempt($request->only('userid', 'password'))) {
            return response()->json('아이디 또는 비밀번호가 맞지 않습니다.');
        }

        $confirmCode = \Str::random(60);

        $user = \App\User::whereUserid($request->userid)->first();

        $user->confirm_code = $confirmCode;
        $user->save();

        \App\Session::create([
            'last_login' => $user->last_login,
            'confirm_code' => $user->confirm_code,
        ]);

        if($user) {
            return response()->json('로그인 성공', 200);
        }

        return response()->json('로그인 성공????', 200);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // \App\Session::first()->delete();
        \App\Session::truncate();

        return response()->json('세션 삭제함', 200);

    }
}
