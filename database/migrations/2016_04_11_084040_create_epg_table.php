<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEpgTable extends Migration {

	public function up()
	{
		Schema::create('epg', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('programGuide');
		});
	}

	public function down()
	{
		Schema::drop('epg');
	}
}