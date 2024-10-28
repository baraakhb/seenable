<?php

namespace BaraaAlKhateeb\Seen\src;


use BaraaAlKhateeb\Seen\Actions\MarkAllAsRead;
use BaraaAlKhateeb\Seen\Actions\MarkAsRead;
use Filament\Facades\Filament;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentSeenServiceProvider extends PackageServiceProvider
{
	public function configurePackage(Package $package): void
	{
		$package
			->name('seenable')
			->hasMigration('create_seenables_table')
			->hasTranslations();
	}
	
	
	public function boot(): void
	{
		parent::boot();;
		Filament::registerActions([
			MarkAllAsRead::make(),
			MarkAsRead::make(),
		]);
	}
	
	
	public function bootingPackage(): void
	{
		$this->loadJSONTranslationsFrom(__DIR__ . '/../lang');
	}
}
