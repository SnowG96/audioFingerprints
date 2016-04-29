<?php

namespace App\Jobs;

use App\AdvNotice;
use App\FingerPrint;
use App\Jobs\Job;
use App\RadioAdvanceNotice;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log,Config;

class indexRadioNotice extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $radio_id;
    protected $new_radio_notice;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($radio_id,$new_radio_notice)
    {
        //
        $this->radio_id = $radio_id;
        $this->new_radio_notice = $new_radio_notice;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::debug("default job started");

        //相对于app目录
        $dejavu = app_path('../../../../home/glx/dejavu/scan_movie.py');
        $index_cmd = "python $dejavu " . $this->new_radio_notice;
        Log::debug($index_cmd);
        //putenv("PATH=/usr/local/bin:/usr/bin"); // 重要：必不可少！！
        putenv("/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:/usr/games:/usr/local/games");

        $ret_last = exec($index_cmd, $output_arr, $ret_val);
        Log::debug($ret_val);
        switch($ret_val) {
            case 0:
                if(!empty($output_arr) && count($output_arr) === 1) { // 正常情况下只有song_id返回
                    $song_id = $output_arr[0];

                    Log::info("default job completed with song_id=$song_id");
                    // 写入movie_songs表一条记录
                    //Log::debug($old_audio);
                    $radio_notices = new RadioAdvanceNotice();
                    $radio_notices->radio_id = $this->radio_id;
                    $radio_notices->advnotice_id = $song_id;
                    $radio_notices->save();
                    //Log::debug("这部电影该类型音频已存在");
                    // return Redirect::to("/auth/login");
                }else{
                    Log::warning("default job encountered exception ", $output_arr);
                }
                break;
            case 1:
            case 2:
            case 3:
                Log::error("default job failed with ret_msg: " . Config::get("shami.audio.indexer.err." . $ret_val));
                break;
            default:
                Log::error("default job failed with ret_code=$ret_val, ", $output_arr);
                break;
        }
        Log::debug("default job finished");
        unlink($this->new_radio_notice); // clean the finished job
    }
}
