<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRadioProgramTable extends Migration {

	public function up()
	{
		Schema::create('radioProgram', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('radio_id');
			$table->integer('program_id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('radioProgram');
	}
}