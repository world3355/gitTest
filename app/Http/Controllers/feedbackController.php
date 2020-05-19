<?php

namespace App\Http\Controllers;
use App\User;
use App\Career;
use App\Expert;
use App\Article;
use Illuminate\Http\Request;

class feedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experts = \App\User::whereClass(2)->join('experts','expert_id','=','experts.id')
        ->join('specialties','specialty_id','=','specialties.id')
        ->join('companies','expert_company_id','=','companies.id')->get();
        // App\User::whereClass(2)->with(array('expert'=>function($query){$query->select('id');}))->get()
        return response()->json($experts, 200);
    }


    public function loadFeedbackList()
    {
        $confirmCode = \App\Session::first();
        $user = \App\User::whereConfirmCode($confirmCode->confirm_code)->first();


        if($user->class == 1) {
            $result = \App\User::find($user->id)->articles()->get();
        } else if($user->class == 2) {
            $result = \App\Expert::find($user->expert_id)->articles()->get();
        } else {
            $result = \App\User::find($user->id)->articles()->get();           
        }

        // $result = \App\User::find($user->id)->articles()->get();

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
        
        $article= new \App\Article();

        $article->user_id=$user->id;
        $article->title=$request->title;
        $article->content=$request->content;
        $article->video=$request->video;

        $article->expert_id=$request->expert_id;
  

        if($article->save()){
            return response()->json($article,200);
        }else{
            return response()->json([
                'message'=>'문제가 발생했습니다',
                'status_code'=>500
            ],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $confirmCode = \App\Session::first();
        // $user = \App\User::whereConfirmCode($confirmCode->confirm_code)->first();

        // // $result1 = \App\Article::join('users','user_id','=','users.id')->find($cid);
        
        // // $result2 = \App\Expert::find($eid);
        // //dkshkahfmrpTek

        // return response()->json([$result1], 200);
    }

    public function test($cid,$eid)
    {
        $confirmCode = \App\Session::first();
        $user = \App\User::whereConfirmCode($confirmCode->confirm_code)->first();

        $result1 = \App\Article::join('users','user_id','=','users.id')->find($cid);
        $result2 = \App\User::where('expert_id', '=', $eid)->firstOrFail();

        return response()->json([$result1,$result2], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Article $article)
    {

        // $article->user_id=$request->user_id;
        // $article->title=$request->title;
        // $article->content=$request->content;
        // $article->video=$request->video;

        // $article->answer=$request->answer;

        // $article->expert_id=$request->expert_id;
  

        // if($article->save()){
        //     return response()->json($article,200);
        // }else{
        //     return response()->json([
        //         'message'=>'문제가 발생했습니다',
        //         'status_code'=>500
        //     ],500);
        // }
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($aid, Request $request)
    {

        $article = Article::findOrFail($aid);

        $article->update([	
            'user_id' => $request->get('user_id'),
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'video' => $request->get('video'),
            'expert_id' => $request->get('expert_id'),
            'answer' => $request->get('answer'),
        ]);

        if($article->save()){
            return response()->json($article,200);
        }else{
            return response()->json([
                'message'=>'문제가 발생했습니다',
                'status_code'=>500
            ],500);
        }

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
