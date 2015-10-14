<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MainCNController extends Controller
{
    public function index() {
    	$counselors = Counselor::all();
    	$user = 'Krishan';
    	return view('main.main-page-cn',compact('counselors','user'));	
    }
}
