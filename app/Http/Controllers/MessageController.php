<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Thread;
use App\Consultant;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function stuIndex()
    {
        return view('messenger-template');  
    }

    protected function threadsToStu($threads, &$usernameList, &$avatarList, &$listLen)
    {
        foreach($threads as $thread)
        {
            $tempCon = Consultant::find($thread->consultant_id);
            array_push($usernameList, $tempCon->username);
            array_push($avatarList, $tempCon->avatar_small);
            $listLen++;
        }
    }

    public function stuNew(Request $request)
    {
        $stuid = Auth::user("student")->id;
        $conid = $request->conid;

        // if it's a new thread then create it
        Thread::firstOrCreate(['student_id' => $stuid,'consultant_id' => $conid]);

        // retrieve lists of usernames and avatars based on threads
        $threads = Thread::where('student_id','=',$stuid)->get(); 
        $listLen = 0;
        $usernameList = [];
        $avatarList = [];
        $this->threadsToStu($threads,$usernameList,$avatarList,$listLen);

        return view('messenger.index',compact('threads','usernameList','avatarList','listLen'));
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
        //
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
        //
    }
}
