<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class MainController extends Controller
{
    public function enindex() {
    	$users = User::all();
    	return view('main.main-page-en',compact('users'));	
    }

    public function cnindex() {
    	$users = User::all();
    	return view('main.main-page-cn',compact('users'));	
    }
    
}
