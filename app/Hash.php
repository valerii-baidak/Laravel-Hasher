<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hash extends Model
{
    protected $table = 'hashes';
	public $timestamps = false;
	protected $fillable = array (
		'vocabulary_id',
		'algorithm',
		'hash'
	);


}
