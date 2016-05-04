<?php

namespace App\Http\Controllers;

use Request;
use Auth;
use Response;
use Input;
use Image;
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

    public function descriptionUpdate()
    {
        $user = Auth::user("consultant");
        $user->description = Input::get('description');
        $user->save();
        return redirect('/consultant/dashboard/overall');
    }

    public function notificationUpdate()
    {
        $user = Auth::user("consultant");
        $user->notification = Input::get('frequency');
        $user->save();
        return redirect('/consultant/dashboard/overall');
    }

    public function avatarUpload()
    {
      $this->wrongTokenAjax();

      // convert base64 to image at the server side
      $data = explode(',', Input::get('cropped_avatar'));
      $avatar_data = base64_decode($data[1]);

      file_put_contents('image64.png', $avatar_data);
      $avatar = new UploadedFile('image64.png','new','image/jpg',null,null,true);

      $user = Auth::user("consultant");
      $destinationPath = 'uploads/';

      // regular avatar
      $filename = "c_" . $user->id . ".jpg";
      $avatar->move($destinationPath, $filename);
      $user->avatar = asset($destinationPath.$filename);

      // smaller avatar, for messenger use
      $smallava = Image::make($destinationPath.$filename)->resize(55, 55);
      $smallfilename = "c_" . $user->id . "_x" . ".jpg";
      $smallava->save($destinationPath.$smallfilename);
      $user->avatar_small = asset($destinationPath.$smallfilename);

      $user->save();

      if (Input::get('redirect')=='dashboard') return redirect('/consultant/dashboard/avatar');
      else return redirect('/consultant/home');
    }

    public function avatar_small($id)
    {
        return Response::json(Consultant::find($id)->avatar_small);
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

    public function activate(Request $request)
    {
        // retrieve user id by url
        $url = Request::url();
        $url = rtrim($url,'/');
        $url = explode('/',$url);

        $user = Consultant::findOrFail($url[4]);
        $user->activated = true;
        $user->save();

        $username = $user->username;

        // login this user
        \Auth::login("consultant",$user);
        return view('consultant.regis-success-cn',compact('username'));
    }

    public function consultantActivation()
    {
        return view('auth.activation-pending-cn');
    }

}
