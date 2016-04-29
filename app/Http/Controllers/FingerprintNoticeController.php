<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator,Config,Log,DB;

class FingerprintNoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * 
     */
    public function getNew()
    {
        return view('fingerprint_upload');
    }

    /**
     * 上传节目预告音频片段
     *
     * @return \Illuminate\Http\Response
     */
    public function postSearch(Request $request)
    {
        //Config::set('session.domain', '127.0.0.1:8000'); // 重要！！运行时设置cookie生效的subdomain
        if ($request->hasFile('fingerprint')) {
            $uploaded_file = $request->file('fingerprint');

            $saveToDir = storage_path('upload/fingerprint' . DIRECTORY_SEPARATOR . date('Y-m-d_H_i_s'));
            //Log::debug("saveToDir:" . $saveToDir);
            if (!is_dir($saveToDir)) {
                mkdir($saveToDir, 0755, true);
            }
            $uploaded_file->move($saveToDir, $uploaded_file->getClientOriginalName());

            $input_file = $saveToDir . DIRECTORY_SEPARATOR . $uploaded_file->getClientOriginalName();
            //Log::debug($input_file);
            $dejavu = dirname(dirname(dirname(dirname(app_path())))) . "/home/glx/dejavu/recognize_movie.py";

            $search_cmd = "python $dejavu $input_file";

//            putenv("PATH=/usr/local/bin:/usr/bin"); // 重要：必不可少！！
            putenv("/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:/usr/games:/usr/local/games");
            $ret_last = exec($search_cmd, $output_arr, $ret_val);

            //Log::debug($search_cmd);
            //Log::debug($output_arr);
            if ($ret_val === 0) {
                $output = array();
                foreach ($output_arr as $line) {
                    $dejavu_rs = json_decode($line, true);

                    if (empty($dejavu_rs) || !is_array($dejavu_rs)) {
                        $message = "没有找到匹配的节目预告";
                        return view('noresult',compact('message'));
                    }

                    //Log::debug($dejavu_rs);
                    // 删除对app无用字段
                    unset($dejavu_rs['match_time']);
                    unset($dejavu_rs['file_sha1']);
                    unset($dejavu_rs['offset']);
                    // TODO 根据song_id查询movie_songs和fingerprints_movie表获取搜索结果展示所需的其他信息
                    $epg = DB::table('advNoticeEpgPro')->where('advnotice_id', '=', $dejavu_rs['song_id'])
                        ->join('epg','epg_id','=','epg.id')
                        ->join('program','program_id','=','program.id')
                        ->select('name', 'programguide', 'offset_s', 'offset_e')
                        ->where('offset_s', '<', $dejavu_rs['offset_seconds'])
                        ->where('offset_e', '>=', $dejavu_rs['offset_seconds'])
                        ->first();
                    //Log::debug($epg);
                    if (empty($epg))
                    {
                        $message = "没有找到匹配的节目单";
                        return view('noresult',compact('message'));
                    }
                    $dejavu_rs['program_name'] = $epg->name;
                    $dejavu_rs['programguide'] = $epg->programguide;

                    unset($dejavu_rs['song_id']);
                    unset($dejavu_rs['song_name']);
                    unset($dejavu_rs['offset_seconds']);
                    unset($dejavu_rs['confidence']);
                    Log::debug($dejavu_rs);
                }
            } else {
                echo('检索使用的音频格式不支持');
            }
        }
        return view('result',compact('epg'));
    }

    /**
     *
     */
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
  
}
