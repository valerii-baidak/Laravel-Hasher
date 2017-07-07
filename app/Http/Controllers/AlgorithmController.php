<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Cart;
use Validator;
use App\Http\Requests\AlgorithmRequest;


class AlgorithmController extends Controller
{
    public function add(AlgorithmRequest $request){
	    $oldCart = Session::has('cart') ? Session::get ('cart') : null;
	    $cart = new Cart ($oldCart);
	    $cart->addHash($request->data);
	    $request->session()->put('cart', $cart);
	    Session::save();
	    $response =$request->session()->get('cart');
	    return response()->json($response);
    }

	public function remove(AlgorithmRequest $request){
		$oldCart = Session::has('cart') ? Session::get ('cart') : null;
		$cart = new Cart ($oldCart);
		$cart->removeHash($request->data);
		$request->session()->put('cart', $cart);
		Session::save();
		$response =$request->session()->get('cart');
		return response()->json($response);
	}
}
