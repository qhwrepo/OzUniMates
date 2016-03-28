<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Thread;
use App\Message;
use App\Consultant;

use URL;
use Response;
use Log;

class MessageController extends Controller
{
    /**
     * Messenger home page
     */
    public function stuIndex()
    {
        $stuid = Auth::user("student")->id;
        $threads = Thread::where('student_id','=',$stuid)->get();
        $listLen = 0;
        $usernameList = [];
        $avatarList = [];
        $this->threadsToStu($threads,$usernameList,$avatarList,$listLen);    

        return view('messenger.index',compact('threads','usernameList','avatarList','listLen'));  
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

        // retrieve a list of messages belonged to a thread
        $messageList = [];

        return view('messenger.index',compact('threads','usernameList','avatarList','listLen'));
    }

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
