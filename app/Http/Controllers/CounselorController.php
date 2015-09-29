<?php

namespace App\Http\Controllers;

use App\Http\Requests;
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

    public function store(Requests\StoreCounselorRequest $request)
    {
        
        $input = $request->all();
        Counselor::create($input);
        return redirect('/index');
    }
    
}
