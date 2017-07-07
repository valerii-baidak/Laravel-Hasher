<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Vocabulary;
use App\Hash;
use App\UserInfo;


class HashController extends Controller
{
    public function save () {
	    if (Session::has('cart')) {
		    $cart = Session::get('cart');
		    foreach ($cart->wordItem as $id => $value) {
			    foreach ($value['encrypt'] as $algorithm => $hash) {
				    $hash = Hash::firstOrNew([
					    'vocabulary_id' =>  $id,
					    'algorithm' =>  $algorithm,
					    'hash' => $hash
				    ]);
				    if (! $hash->exists){
					    $hash->save();
					    $hash= $hash->toArray();
					    $hash['word'] = $value['word'];
					    $UserInfo['hash'][]= $hash;
				    }
			    }
		    }
	    }
		if (isset($UserInfo)) {
			$geoIp = geoip()->getLocation();
			$UserInfo['info']['ip'] = $geoIp['ip'];
			$UserInfo['info']['country'] =  $geoIp['country'];
			$UserInfo['info']['cookie'] = request()->cookie();
			$UserInfo['info']['agent'] = request()->header('User-Agent');
			$json = json_encode ($UserInfo);

			$info = new UserInfo;
			$info->info = $json;
			$info->save();
		}

    }
}
