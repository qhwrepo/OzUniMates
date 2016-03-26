<?php

namespace App\Http\Controllers;

use Request;
use Auth;
use Response;
use Input;
use Validator;
use Session;
use App\Http\Controllers\Controller;
use App\Consultant;
use App\Student;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ConsultantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function home()
    {
        $students = Student::all();
        $user = Auth::user("consultant");
        return view('consultant.home',compact('students','user'));
    }

    public function homeEn()
    {
        $students = Student::all();
        $user = Auth::user("consultant");
        return view('consultant.home-en',compact('students','user'));
    }

    public function dashboardOverall()
    {
        $user = Auth::user("consultant");
        return view('consultant.dashboard-overall',compact('user'));
    }

    public function dashboardAvatar()
    {
        $user = Auth::user("consultant");
        return view('consultant.dashboard-avatar',compact('user'));
    }

    public function dashboardChat()
    {
        $user = Auth::user("consultant");
        return view('consultant.dashboard-chat',compact('user'));
    }

    public function dashboardCase()
    {
        $user = Auth::user("consultant");
        return view('consultant.dashboard-case',compact('user'));
    }

    public function index()
    {
        return Response::json(Consultant::get());
    }

    public function username($id)
    {
        return Response::json(Consultant::find($id)->username);
    }

    public function newbee()
    {
        return view('consultant.regis-success-cn');
    }

    public function newbeeEn()
    {
        return view('consultant.regis-success-en');
    }

    public function descriptionUpdate()
    {
        $description = Input::get('description');
        $user = Auth::user("consultant");
        $user->description = $description;
        $user->save();
        return redirect('/consultant/dashboard/overall');
    }

    public function avatarUpload()
    {
        $this->wrongTokenAjax();

        $original = Input::file('image');

        // convert base64 to image at the server side
        $data = explode(',', Input::get('cropped_avatar'));
        $avatar_data = base64_decode($data[1]);

        file_put_contents('image64.png', $avatar_data);
        $avatar = new UploadedFile('image64.png',$original->getClientOriginalName(),'image/jpg',null,null,true);

        $input = array('image' => $original);
        $rules = array(
            'image' => 'image'
        );
        $validator = Validator::make($input, $rules);
        if ( $validator->fails() ) {
            return Response::json([
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ]);

        }

        $user = Auth::user("consultant");
        $destinationPath = 'uploads/';
        $filename = "c_" . $user->id . ".jpg";
        $avatar->move($destinationPath, $filename);
        $user->avatar = asset($destinationPath.$filename);
        $user->save();
        return redirect('/consultant/home');
    }

    public function wrongTokenAjax()
    {
        if ( Session::token() !== Request::get('_token') ) {
            $response = [
                'status' => false,
                'errors' => 'Wrong Token',
            ];

            return Response::json($response);
        }

    }

    public function tags($conid)
    {
        $tag_arr = Consultant::find($conid)->tags;
        $arrlen = sizeof($tag_arr);
        $tag_list = [];
        for($i=0;$i<$arrlen;$i++){
            array_push($tag_list, $tag_arr[$i]['name']);
        }
        return Response::json($tag_list);
    }

}
