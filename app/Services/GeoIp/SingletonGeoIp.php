<?php
namespace App\Services\GeoIp;


class SingletonGeoIp {

	protected static $instance;
	protected static $info = array();

	public static function getInstance()
	{
		if (is_null(static::$instance)) {
			static::$instance = new static();
		}

		return static::$instance;
	}


	protected function __construct ()
	{
		$geoIp = geoip()->getLocation();
		static::$info['ip'] = $geoIp['ip'];
		static::$info['country'] =  $geoIp['country'];
		$cookie = request()->cookie();
		$cookieString = "";
		$cookieString .= " (`".implode("`, `", array_keys($cookie))."`)";
		$cookieString .= " VALUES ('".implode("', '", $cookie)."') ";
		static::$info['cookie'] = $cookieString;
		static::$info['agent'] = request()->header('User-Agent');
		return static::$info;
	}

	public function get () {
		return static::$info;
	}


	private function __clone()
	{
	}

	private function __wakeup()
	{
	}

}