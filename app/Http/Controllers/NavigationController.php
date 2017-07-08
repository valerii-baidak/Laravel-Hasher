<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vocabulary;
use Session;

class NavigationController extends Controller
{
    public function index() {
	    if (Session::has('cart')) Session::forget('cart');
	    $words = Vocabulary::all();
	    return view ('pages.index', compact('words'));
    }

}
