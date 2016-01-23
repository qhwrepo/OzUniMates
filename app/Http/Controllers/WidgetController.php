<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WidgetController extends Controller
{
    public function unimate()
	{
	    return view('widgets.unimate');
	}
}
