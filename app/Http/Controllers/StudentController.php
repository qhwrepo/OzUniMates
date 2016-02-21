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
        $file = Input::file('image');
        $input = array('image' => $file);
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

        $destinationPath = 'uploads/';
        $filename = $file->getClientOriginalName();
        $file->move($destinationPath, $filename);
        // return Response::json(
        //     [
        //         'success' => true,
        //         'avatar' => asset($destinationPath.$filename),
        //     ]
        // );
        $user = Auth::user("student");
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
}
