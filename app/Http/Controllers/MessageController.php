<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Thread;
use App\Message;
use App\Consultant;
use App\Student;

use URL;
use Response;
use Log;

class MessageController extends Controller
{

    /***
    *     Student
    ***/

    // home page
    public function stuIndex()
    {
        $stuid = Auth::user("student")->id;
        $threads = Thread::where('student_id','=',$stuid)->get();
        $listLen = 0;
        $usernameList = [];
        $avatarList = [];
        $this->threadsToStu($threads,$usernameList,$avatarList,$listLen);
        if(sizeof($threads)>0) $messages = Message::where('thread_id','=',$threads[0]->id)->get();
        else $messages=[];  

        return view('messenger.index_student',compact('threads','usernameList','avatarList','listLen','messages'));  
    }

    // retrieve lists of usernames and avatar(small)s

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

    // when clicking "message" button - redirect to messenger page
    // and create a new thread if necessary

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

        // retrieve a list of messages belonged to the first thread
        if(sizeof($threads)>0) $messages = Message::where('thread_id','=',$threads[0]->id)->get();
        else $messages=[];

        return view('messenger.index_student',compact('threads','usernameList','avatarList','listLen','messages'));
    }


    /***
    *     Consultant
    ***/
    // home page
    public function conIndex()
    {
        $conid = Auth::user("consultant")->id;
        $threads = Thread::where('consultant_id','=',$conid)->get();
        $listLen = 0;
        $usernameList = [];
        $avatarList = [];
        $this->threadsToCon($threads,$usernameList,$avatarList,$listLen);
        if(sizeof($threads)>0) $messages = Message::where('thread_id','=',$threads[0]->id)->get();
        else $messages=[];

        return view('messenger.index_consultant',compact('threads','usernameList','avatarList','listLen','messages'));  
    }

    // retrieve lists of usernames and avatar(small)s

    protected function threadsToCon($threads, &$usernameList, &$avatarList, &$listLen)
    {
        foreach($threads as $thread)
        {
            $tempStu = Student::find($thread->student_id);
            array_push($usernameList, $tempStu->username);
            array_push($avatarList, $tempStu->avatar_small);
            $listLen++;
        }
    }

    // when clicking "message" button - redirect to messenger page
    // and create a new thread if necessary

    public function ConNew(Request $request)
    {
        $conid = Auth::user("consultant")->id;
        $stuid = $request->stuid;

        // if it's a new thread then create it
        Thread::firstOrCreate(['consultant_id' => $conid,'student_id' => $stuid]);

        // retrieve lists of usernames and avatars based on threads
        $threads = Thread::where('consultant_id','=',$conid)->get(); 
        $listLen = 0;
        $usernameList = [];
        $avatarList = [];
        $this->threadsToCon($threads,$usernameList,$avatarList,$listLen);

        // retrieve a list of messages belonged to the first thread
        if(sizeof($threads)>0) $messages = Message::where('thread_id','=',$threads[0]->id)->get();
        else $messages=[];

        return view('messenger.index_consultant',compact('threads','usernameList','avatarList','listLen','messages'));
    }


    /***
    *     Common
    ***/

    // retrieve messages based on thread id

    public function getMessages($thread_id)
    {
        $messageModels = Message::where('thread_id','=',$thread_id)->get();
        return Response::json($messageModels);
    }

    // create a new message

    public function newMessage(Request $request)
    {
        Message::create($request->all());
        return redirect(URL::previous());
    }
    

   
}
