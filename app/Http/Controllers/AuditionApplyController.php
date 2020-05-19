<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuditionApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $confirmCode = \App\Session::first();

        $user = \App\User::whereConfirmCode($confirmCode->confirm_code)->first();

        $result = \App\User::join('ranks','rank_id','=','ranks.id')
        ->whereConfirmCode($confirmCode->confirm_code)->first();

        return response()->json($result, 200);
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

        $result = \App\User::find($user->id)->resumes()->create([
            'score' => $request->score,
            'message' => $request->text,
            // 'result' => ,
            'audition_id' => $request->audition_id,
        ]);

        return response()->json($result, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        //
    }
}
