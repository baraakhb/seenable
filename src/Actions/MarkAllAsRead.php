<?php

namespace BaraaAlKhateeb\Seen\Actions;


use BaraaAlKhateeb\Seen\Models\Seenable;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\Action;

class MarkAllAsRead extends Action
{
	public static function getDefaultName(): ?string
	{
		return 'Mark all as read';
	}
	
	
	protected function setUp(): void
	{
		parent::setUp();
		$this->label('Mark all as read')
			->icon('heroicon-o-check')
			->outlined()
			->color('success')
			->action(function () {
				// Mark all unseen records as seen
				Seenable::whereSeenableType(static::getModel())->delete();
				Notification::make()
					->title('Read All !')
					->success()
					->send();
			});
		$this->visible(fn() => Seenable::whereSeenableType(static::getModel())->exists());
	}
}
