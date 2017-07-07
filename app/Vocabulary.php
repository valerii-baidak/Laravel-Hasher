<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
	public $timestamps = false;
	protected $table = 'vocabulary';

	public function hash()
	{
		return $this->hasOne('App\Hash');
	}
}
