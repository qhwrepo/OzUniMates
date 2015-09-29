<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Counselor;

class MainController extends Controller
{
    public function index() {
    	$counselors = Counselor::all();
    	$user = 'Krishan';
    	return view('main.main-page',compact('counselors','user'));	
    }

    public function show($id)
	{
	    $counselor = Counselor::findOrFail($id);
	    $user = 'Krishan';
	    return view('main.browse-counselor',compact('counselor','user'));
	}
    
}
