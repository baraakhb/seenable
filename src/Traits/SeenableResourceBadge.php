<?php

namespace BaraaAlKhateeb\Seen\Traits;


trait SeenableResourceBadge
{
	public static function getNavigationBadge(): ?string
	{
		$countNotSeen = self::$model::countNotSeen();
		
		return $countNotSeen ?: null;
	}
}