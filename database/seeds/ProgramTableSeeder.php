<?php

use Illuminate\Database\Seeder;
use App\Program;

class ProgramTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('program')->delete();

		// ProgramTableSeeder
		Program::create(array(
			'name' => 'Morning Call',
			'broadcasttime' => '每天6:00到7:00',
			'duration' => 60
		));
		Program::create(array(
			'name' => 'Hit Morning Show',
			'broadcasttime' => '每天7:00到10:00',
			'duration' => 180
		));
		Program::create(array(
			'name' => 'At Work Network',
			'broadcasttime' => '每天10:00到13:00',
			'duration' => 180
		));
		Program::create(array(
			'name' => 'Lazy Afternoon',
			'broadcasttime' => '每天13:00到16:00',
			'duration' => 180
		));
		Program::create(array(
			'name' => 'Big Drive Home',
			'broadcasttime' => '每天16:00到19:00',
			'duration' => 180
		));
		Program::create(array(
			'name' => 'New Music Express',
			'broadcasttime' => '每天19:00到22:00',
			'duration' => 180
		));
		Program::create(array(
			'name' => '新鲜早世界',
			'broadcasttime' => '除周二每天6:00到7:00',
			'duration' => 60
		));
		Program::create(array(
			'name' => '新闻和报纸摘要',
			'broadcasttime' => '除周二每天7:00到7:30',
			'duration' => 30
		));
		Program::create(array(
			'name' => '天下财经',
			'broadcasttime' => '除周二每天7:30到9:00',
			'duration' => 60
		));
		Program::create(array(
			'name' => '央广财经评论',
			'broadcasttime' => '每天9:00到21:00',
			'duration' => 720
		));
		Program::create(array(
			'name' => '那些年',
			'broadcasttime' => '除周二每天21:00到22:00',
			'duration' => 720
		));
		Program::create(array(
			'name' => '每当夜晚来临的时候',
			'broadcasttime' => '除周二每天22:00到23:00',
			'duration' => 60
		));
		Program::create(array(
			'name' => '财经夜读',
			'broadcasttime' => '除周二每天23:00到24:00',
			'duration' => 60
		));
		Program::create(array(
			'name' => '记忆的唱片',
			'broadcasttime' => '每天6:00到7:00',
			'duration' => 60
		));
		Program::create(array(
			'name' => '先听为快',
			'broadcasttime' => '周一到周五7:00到10:00',
			'duration' => 180
		));
		Program::create(array(
			'name' => '边走边唱',
			'broadcasttime' => '每天10:00到12:00',
			'duration' => 60
		));
		Program::create(array(
			'name' => '带你聆听',
			'broadcasttime' => '每天12:00到13:00',
			'duration' => 60
		));
		Program::create(array(
			'name' => '永恒的魅力',
			'broadcasttime' => '每天13:00到14:00',
			'duration' => 60
		));
		Program::create(array(
			'name' => '古典也流行',
			'broadcasttime' => '周一到周五14:00到15:00',
			'duration' => 60
		));
		Program::create(array(
			'name' => '午后大道东',
			'broadcasttime' => '周一到周五15:00到17:00',
			'duration' => 120
		));
		Program::create(array(
			'name' => '就听好歌不听话',
			'broadcasttime' => '每天17:00到19:00',
			'duration' => 120
		));
		Program::create(array(
			'name' => '中国歌曲排行榜',
			'broadcasttime' => '每天19:00到21:00',
			'duration' => 120
		));
		Program::create(array(
			'name' => '爱的更久点',
			'broadcasttime' => '每天21:00到22:00',
			'duration' => 60
		));
	}
}