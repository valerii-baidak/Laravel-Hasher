<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Hash;
use App\UserInfo;

class HashController extends Controller
{
    public function save () {
	    if (Session::has('cart')) {
		    $cart = Session::get('cart');
		    foreach ($cart->wordItem as $id => $value) {
			    foreach ($value['encrypt'] as $algorithm => $hash) {
				    $hashTable = Hash::firstOrNew([
					    'vocabulary_id' =>  $id,
					    'algorithm' =>  $algorithm,
					    'hash' => $hash
				    ]);

				    if (! $hashTable->exists){
					    $hashTable->save();
					    $userHash = $hashTable->toArray();
					    $userHash['word'] = $value['word'];
					    $userHash['hash']= $hash;
					    $userInformation = resolve('App\Services\UserInformation');
					    $userInformation  = $userInformation->get();
					    $userInfoHash = array_merge($userHash, $userInformation );
					    $userInfo = new UserInfo;
					    $userInfo->info =  $userInfoHash;
					    $userInfo->save();
				    }
			    }
		    }
	    }
    }
}
