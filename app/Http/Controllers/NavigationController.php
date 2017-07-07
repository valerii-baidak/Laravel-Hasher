<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vocabulary;
use Session;


use App\UserInfo;
use SoapBox\Formatter\Formatter;
use Illuminate\Support\Facades\Storage;

class NavigationController extends Controller
{
    public function index(Request $request) {
	    if (Session::has('cart')) Session::forget('cart');
	    $words = Vocabulary::all();
	    return view ('pages.index', compact('words'));
    }

}
