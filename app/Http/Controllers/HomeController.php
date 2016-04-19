<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Articles;

use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
 

    		$date = new Carbon;
    
    		return view('home.index', compact('date'));
    }
}