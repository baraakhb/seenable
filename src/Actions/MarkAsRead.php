<?php

namespace BaraaAlKhateeb\Seen\Actions;


use Filament\Tables\Actions\Action;

class MarkAsRead extends Action
{
	public static function getDefaultName(): ?string
	{
		return 'Mark as read';
	}
	
	
	protected function setUp(): void
	{
		parent::setUp();
		$this->label('Mark as read')
			->action(fn() => $this->record->markAsSeen())
			->icon('heroicon-o-check')
			->color('success')
			->visible(fn() => !$this->record->isSeen());
	}
	
}
