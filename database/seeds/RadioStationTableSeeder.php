<?php

use Illuminate\Database\Seeder;
use App\RadioStation;

class RadioStationTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('radioStation')->delete();

		// radioStationTableSeeder
		RadioStation::create(array(
			'name' => '中国国际广播电台HIT FM',
			'introduction' => '北京地区 调频 88.7'
		));
		RadioStation::create(array(
			'name' => '中央人民广播电台经济之声',
			'introduction' => '北京地区 调频 96.6'
		));
		RadioStation::create(array(
			'name' => '北京人民广播电台音乐台',
			'introduction' => '调频 97.4'
		));
	}
}