<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class HomeController extends Controller
{
    function index()
    {
    	return view('welcome');
    }
}

?>
