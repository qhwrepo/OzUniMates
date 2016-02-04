<?php

namespace App\Http\Controllers;

use Request;
use Response;
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
        return view('student.home',compact('consultants'));
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
