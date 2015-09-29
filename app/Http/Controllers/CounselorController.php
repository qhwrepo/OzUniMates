<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    
}
