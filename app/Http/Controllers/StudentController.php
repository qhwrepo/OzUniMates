<?php

namespace App\Http\Controllers;

use Request;
use Auth;
use Response;
use Input;
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
        return view('student.home',compact('consultants','user'));
    }

    public function index()
    {
        return Response::json(Student::get());
    }

    public function newbee()
    {
        return view('student.regis-success-cn');
    }

    public function newbeeEn()
    {
        return view('student.regis-success-en');
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
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
        Student::destroy($id);
 
        return Response::json(array('success' => true));
    }

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
}
