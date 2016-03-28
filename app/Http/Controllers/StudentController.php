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
use App\Student;
use App\Consultant;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function home()
    {
        $consultants = Consultant::all();
        $user = Auth::user("student");
        return view('student.home',compact('consultants','user'));
    }

    public function homeEn()
    {
        $consultants = Consultant::all();
        $user = Auth::user("student");
        return view('student.home-en',compact('consultants','user'));
    }

    public function dashboardOverall()
    {
        $user = Auth::user("student");
        return view('student.dashboard-overall',compact('user'));
    }

    public function dashboardAvatar()
    {
        $user = Auth::user("student");
        return view('student.dashboard-avatar',compact('user'));
    }

    public function dashboardChat()
    {
        $user = Auth::user("student");
        return view('student.dashboard-chat',compact('user'));
    }

    public function dashboardCase()
    {
        $user = Auth::user("student");
        return view('student.dashboard-case',compact('user'));
    }

    public function index()
    {
        return Response::json(Student::get());
    }

    public function studentActivation()
    {
        return view('student.activation');
    }

    public function newbee()
    {
        return view('student.regis-success-cn');
    }

    public function newbeeEn()
    {
        return view('student.regis-success-en');
    }

    public function descriptionUpdate()
    {
        $description = Input::get('description');
        $user = Auth::user("student");
        $user->description = $description;
        $user->save();
        return redirect('/student/dashboard/overall');
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

        $user = Auth::user("student");
        $destinationPath = 'uploads/';
        $filename = "s_" . $user->id . ".jpg";
        $avatar->move($destinationPath, $filename);
        $user->avatar = asset($destinationPath.$filename);

        // smaller avatar, for messenger use
        $smallava = Image::make($destinationPath.$filename)->resize(55, 55);
        $smallfilename = "s_" . $user->id . "_x" . ".jpg";
        $smallava->save($destinationPath.$smallfilename);
        $user->avatar_small = asset($destinationPath.$smallfilename);

        $user->save();
        return redirect('/student/home');
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
        Student::destroy($id);
 
        return Response::json(array('success' => true));
    }

    public function activate(Request $request)
    {
        // retrieve user id by url
        $url = Request::url();
        $url = rtrim($url,'/');
        $url = explode('/',$url);

        $user = Student::findOrFail($url[4]);
        $user->activated = true;
        $user->save();
        return redirect('student/regis-success');
    }

    public function studentActivation()
    {
        return view('auth.activation-pending-cn');
    }

    // Json api
    
    public function universities($studid)
    {
        $uni_arr = Student::find($studid)->universities;
        $arrlen = sizeof($uni_arr);
        $uni_list = [];
        for($i=0;$i<$arrlen;$i++){
            array_push($uni_list, $uni_arr[$i]['name']);
        }
        return Response::json($uni_list);
    }

    public function majors($studid)
    {
        $major_arr = Student::find($studid)->majors;
        $arrlen = sizeof($major_arr);
        $major_list = [];
        for($i=0;$i<$arrlen;$i++){
            array_push($major_list, $major_arr[$i]['name']);
        }
        return Response::json($major_list);
    }

    public function username($id)
    {
        return Response::json(Student::find($id)->username);
    }

    public function avatar_small($id)
    {
        return Response::json(Student::find($id)->avatar_small);
    }
}
