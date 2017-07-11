<?php
namespace App\Services;


class UserInformation {

	private $info = array();

	public function __construct ()
	{
		$geoIp = geoip()->getLocation();
		$this->info['ip'] = $geoIp['ip'];
		$this->info['country'] =  $geoIp['country'];
		$cookie = request()->cookie();
		$cookieString = "";
		$cookieString .= " (`".implode("`, `", array_keys($cookie))."`)";
		$cookieString .= " VALUES ('".implode("', '", $cookie)."') ";
		$this->info['cookie'] = $cookieString;
		$this->info['agent'] = request()->header('User-Agent');
	}

	public function get () {
		return $this->info;
	}
}