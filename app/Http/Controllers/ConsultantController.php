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

    public function index()
    {
        return Response::json(Consultant::get());
    }

    public function newbee()
    {
        return view('consultant.regis-success-cn');
    }

    public function newbeeEn()
    {
        return view('consultant.regis-success-en');
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

        $destinationPath = 'uploads/';
        $filename = $original->getClientOriginalName();
        $avatar->move($destinationPath, $filename);
        // return Response::json(
        //     [
        //         'success' => true,
        //         'avatar' => asset($destinationPath.$filename),
        //     ]
        // );
        $user = Auth::user("consultant");
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

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
