<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdvNoticeEpgProTable extends Migration {

	public function up()
	{
		Schema::create('advNoticeEpgPro', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('advnotice_id');
			$table->integer('epg_id');
			$table->integer('program_id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('advNoticeEpgPro');
	}
}