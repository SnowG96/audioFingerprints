<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProgramTable extends Migration {

	public function up()
	{
		Schema::create('program', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 20);
			$table->string('broadcasttime',50);
			$table->integer('duration');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('program');
	}
}