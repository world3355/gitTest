<?php

namespace App\Http\Controllers;
use App\Audition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuditionController extends Controller
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

        $audition = \App\Audition::orderBy('created_at','desc')
        ->with(array('user'=>function($query){
            $query->with(array('company'=>function($query){
                $query->get();
            }
        ));}))->get();

        // App\User::whereClass(2)
        //->with(array('expert'=>function($query){$query->select('id');}))->get()

        // $audition= Audition::orderBy('created_at','desc')->paginate();
        return response()->json([$audition, $user],200);
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
        // 유효성검사
        $request->validate([
            // 'title'=>'required|min:6',
            // 'context'=>'required|min:10',
            'image' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        $confirmCode = \App\Session::first();

        $user = \App\User::whereConfirmCode($confirmCode->confirm_code)->first();
        
        $audition=new \App\Audition();

        $audition->user_id=$user->id;

        // 제목 저장
        $audition->title=$request->title;

        // 본문 저장
        $audition->content=$request->content;

        // 이미지 파일 경로설정
        $path=$request->file('image')->store('auditon_image');

        // 파일 경로 저장
        $audition->image=$path;

        if($audition->save()){
            // return response()->json($audition,200);
            return response()->json($audition,200);
        }else{
            return response()->json([
                'message'=>'문제가 발생했습니다',
                'status_code'=>500
            ],500);
        }


        // dd($request->all());

        // return response()->json($request->all(),200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        //$result=Audition::find($id);
        $confirmCode = \App\Session::first();

        $user = \App\User::whereConfirmCode($confirmCode->confirm_code)->first();
        
        
            
        $result = \App\Audition::join('users','user_id','=','users.id')
        ->join('companies','company_id','=','companies.id')->find($id);
        return response()->json([$result,$user], 200);
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
    public function update(Request $request,Audition $audition)
    {
        
        $audition->title=$request->title;
        $audition->content=$request->content;
        $oldPath=$audition->image;

        if($request->hasFile('image')){
            $path=$request->file('image')->store('auditon_image');
            $audition->image=$path;

            Storage::delete($oldPath);
        }else{
            $audition->image=$oldPath;

        }

        
        if($audition->save()){
            return response()->json($audition,200);
        }else{
            Storage::delete($path);
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
    public function destroy(Audition $audition)
    {
        if($audition->delete()){
            Storage::delete($audition->image);
            return response()->json([
                'message'=>'오디션 공고가 삭제되었습니다.',
                'status_code'=>200
            ],200);
        }else{
            return response()->json([
                'message'=>'문제가 발생했습니다',
                'status_code'=>500
            ],500);
        }
    }
        
}
