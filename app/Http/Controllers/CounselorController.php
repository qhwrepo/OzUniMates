<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use App\Counselor;

class CounselorController extends Controller
{

    public function show($id)
	{
	    $counselor = Counselor::findOrFail($id);
	    $user = 'Krishan';
	    return view('counselor.browse',compact('counselor','user'));
	}

    public function create()
    {
        return view('counselor.create');
    }

    public function store()
    {
        
        $input = Request::all();
        
        Counselor::create($input);
        return redirect('/index');
    }
    
}
