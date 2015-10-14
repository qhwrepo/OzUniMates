<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Request;

class UserController extends Controller
{

    public function show($id)
	{
	    $user = User::findOrFail($id);
	    return view('user.browse',compact('user'));
	}

    public function create()
    {
        return view('Registration.register-en');
    }

    public function store()
    {
        $input = Request::all();
        User::create($input);
        return redirect('en/success-regis');
    }
    
}
