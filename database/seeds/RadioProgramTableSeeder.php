<?php

use Illuminate\Database\Seeder;
use App\RadioProgram;

class RadioProgramTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('radioProgram')->delete();

		// radioProgramTableSeeder
		RadioProgram::create(array(
			'radio_id' => 1,
			'program_id' => 1
		));
		RadioProgram::create(array(
			'radio_id' => 1,
			'program_id' => 2
		));
		RadioProgram::create(array(
			'radio_id' => 1,
			'program_id' => 3
		));
		RadioProgram::create(array(
			'radio_id' => 1,
			'program_id' => 4
		));
		RadioProgram::create(array(
			'radio_id' => 1,
			'program_id' => 5
		));
		RadioProgram::create(array(
			'radio_id' => 1,
			'program_id' => 6
		));
		RadioProgram::create(array(
			'radio_id' => 2,
			'program_id' => 7
		));
		RadioProgram::create(array(
			'radio_id' => 2,
			'program_id' => 8
		));
		RadioProgram::create(array(
			'radio_id' => 2,
			'program_id' => 9
		));
		RadioProgram::create(array(
			'radio_id' => 2,
			'program_id' => 10
		));
		RadioProgram::create(array(
			'radio_id' => 2,
			'program_id' => 11
		));
		RadioProgram::create(array(
			'radio_id' => 2,
			'program_id' => 12
		));
		RadioProgram::create(array(
			'radio_id' => 2,
			'program_id' => 13
		));
		RadioProgram::create(array(
			'radio_id' => 3,
			'program_id' => 14
		));
		RadioProgram::create(array(
			'radio_id' => 3,
			'program_id' => 15
		));
		RadioProgram::create(array(
			'radio_id' => 3,
			'program_id' => 16
		));
		RadioProgram::create(array(
			'radio_id' => 3,
			'program_id' => 17
		));
		RadioProgram::create(array(
			'radio_id' => 3,
			'program_id' => 18
		));
		RadioProgram::create(array(
			'radio_id' => 3,
			'program_id' => 19
		));
		RadioProgram::create(array(
			'radio_id' => 3,
			'program_id' => 20
		));
		RadioProgram::create(array(
			'radio_id' => 3,
			'program_id' => 21
		));
		RadioProgram::create(array(
			'radio_id' => 3,
			'program_id' => 22
		));
		RadioProgram::create(array(
			'radio_id' => 3,
			'program_id' => 23
		));
	}
}