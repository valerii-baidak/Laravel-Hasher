<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
	protected $table = 'user_info';

	protected $casts = [
			'info' => 'array',
	];
}
