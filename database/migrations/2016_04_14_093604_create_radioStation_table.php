<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRadioStationTable extends Migration {

	public function up()
	{
		Schema::create('radioStation', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 20);
			$table->string('introduction', 100);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('radioStation');
	}
}