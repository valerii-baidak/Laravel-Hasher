<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vocabulary;
use Session;
use App\Cart;
use App\Http\Requests\WordRequest;

class WordController extends Controller
{

	public function add(WordRequest $request){
		$id = $request->data;
		$word = Vocabulary::where('id', $id)->value('word');
		$oldCart = Session::has('cart') ? Session::get ('cart') : null;
		$cart = new Cart ($oldCart);
		$cart->addWord($word, $id);
		$request->session()->put('cart', $cart);
		Session::save();
		$response =$request->session()->get('cart');
		return response()->json($cart);
}

	public function remove(WordRequest $request){
		$oldCart = Session::has('cart') ? Session::get ('cart') : null;
		$cart = new Cart ($oldCart);
		$cart->removeWord($request->data);
		$request->session()->put('cart', $cart);
		Session::save();
		$response =$request->session()->get('cart');
		return response()->json($response);
	}
}
