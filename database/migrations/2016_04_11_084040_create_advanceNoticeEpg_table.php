<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdvanceNoticeEpgTable extends Migration {

	public function up()
	{
		Schema::create('advanceNoticeEpg', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('advanceNotice_id');
			$table->integer('epg_id');
		});
	}

	public function down()
	{
		Schema::drop('advanceNoticeEpg');
	}
}