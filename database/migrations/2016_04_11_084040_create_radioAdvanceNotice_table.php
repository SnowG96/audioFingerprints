<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRadioAdvanceNoticeTable extends Migration {

	public function up()
	{
		Schema::create('radioAdvanceNotice', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('radio_id');
			$table->integer('advanceNotice_id');
		});
	}

	public function down()
	{
		Schema::drop('radioAdvanceNotice');
	}
}