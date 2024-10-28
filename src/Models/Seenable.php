<?php

namespace BaraaAlKhateeb\Seen\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Seenable extends Model
{
	protected $fillable = [
		'seenable_id',
		'seenable_type',
	];
	
	
	public function seenable(): MorphTo
	{
		return $this->morphTo('seenable');
	}
}
