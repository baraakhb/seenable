<?php

namespace BaraaAlKhateeb\Seen\Traits;


use BaraaAlKhateeb\Seen\Models\Seenable;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait ActSeenable
{
	/**
	 * Get all the model's "seenable" activities.
	 */
	public function seenable(): MorphOne
	{
		return $this->morphOne(Seenable::class, 'seenable');
	}
	
	
	/**
	 * Mark the model as seen.
	 */
	public function markAsSeen(): void
	{
		$this->seenable()->delete();
	}
	
	
	/**
	 * Mark the model as seen.
	 */
	public function setNotSeen(): void
	{
		$this->seenable()->create();
	}
	
	
	public function isSeen(): bool
	{
		return !$this->seenable()->exists();
	}
	
	
	public static function countNotSeen(): int
	{
		return static::whereHas('seenable', function ($query) {
			$query->where('seenable_type', self::class);
		})->count();
	}
	
}