<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
    
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|min:3',
        //     'image' => 'required|image|mimes:jpeg,png,jpg'
        // ]);

        $user = \App\User::create([
            'userid' => $request->userid,
            'password' => bcrypt($request->password),
            'name' => $request->name,
        //    'image' =>,
            'address' => $request->address,
            'call_number' => $request->call_number,
        //    'introduction' => $request->introduction,
        //    'class',
        ]);

        return response()->json($user, 200);

        // if($user){
        //     return response()->json($category, 200);
        // } else{
        //     return response()->json($category, 500);
        // }
    }

    public function show($id)
    {
        $session = \App\Session::find(1)->first();

        $confirm_code = $session->confirm_code;

        $user = \App\User::join('ranks','rank_id','=','ranks.id')
        ->whereConfirmCode($confirm_code)->first();

        return response()->json(var_export($user), 200);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
