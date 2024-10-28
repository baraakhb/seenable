<?php

namespace BaraaAlKhateeb\Seen\Traits;


use Illuminate\Database\Eloquent\Builder;

trait SeenableTableListing
{
	protected function getTableQuery(): ?Builder
	{
		$query = parent::getTableQuery();
		$modelClass = static::getModel();
		$tableName = (new $modelClass())->getTable();
		
		// Join with the seenables table to filter records
		return $query->leftJoin('seenables', function ($join) use ($modelClass, $tableName) {
			$join->where('seenables.seenable_type', '=', $modelClass);
			$join->on("$tableName.id", '=', 'seenables.seenable_id');
		})->select("$tableName.*") // Ensure to select your main table's columns
		->orderByRaw('seenables.seenable_id IS NOT NULL DESC'); // Sort to prioritize records with seenables
	}
}