<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEpgTable extends Migration {

	public function up()
	{
		Schema::create('epg', function(Blueprint $table) {
			$table->increments('id');
			$table->text('programguide');
			$table->integer('offset_s')->unsigned()->nullable();
			$table->integer('offset_e')->unsigned()->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('epg');
	}
}