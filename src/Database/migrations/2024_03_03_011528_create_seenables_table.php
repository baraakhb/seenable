<?php

namespace BaraaAlKhateeb\Seen\src\Database\migrations;


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up(): void
	{
		Schema::create('seenables', function (Blueprint $table) {
			$table->id();
			$table->morphs('seenable');
			$table->timestamps();
		});
	}
	
	
	public function down(): void
	{
		Schema::dropIfExists('seenables');
	}
};
