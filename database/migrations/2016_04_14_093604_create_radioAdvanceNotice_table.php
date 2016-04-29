<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRadioAdvanceNoticeTable extends Migration {

	public function up()
	{
		Schema::create('radioAdvanceNotice', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('radio_id');
			$table->integer('advnotice_id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('radioAdvanceNotice');
	}
}