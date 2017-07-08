<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Vocabulary;
use App\Hash;
use App\UserInfo;
use App\Services\GeoIp\SingletonGeoIp;


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
					    $UserInfo= $hashTable->toArray();
					    $UserInfo['word'] = $value['word'];
					    $UserInfo['hash']= $hash;
					    $GeoIp = SingletonGeoIp::getInstance();
					    $info = $GeoIp->get();
					    $UserInfo= array_merge($UserInfo, $info );
					    $json = json_encode ($UserInfo);
					    $info = new UserInfo;
					    $info->info = $json;
					    $info->save();
				    }
			    }
		    }
	    }
    }
}
