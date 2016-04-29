<?php
namespace App\Http\Controllers;

use App\AdvanceNoticeEpgPro;
use App\Epg;
use App\Jobs\indexRadioNotice;
use App\RadioAdvanceNotice;
use App\RadioProgram;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\AdvNotice;
use App\RadioStation;
use Log,Redirect,DB,Validator;

class RadioAdvanceNoticeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

    }

    /**
     *
     */
    
    public function getEpg($song_id,Request $request)
    {
        $radio_id = $request->get('radio_id');
        //Log::debug($song_id);
        //Log::debug($radio_id);
        $allprogram = DB::table('radioProgram')->where('radio_id','=',$radio_id)->join('program','program_id','=','program.id')->select('program_id','name')->get();
        //$epg = DB::table('advNoticeEpgPro')->where('advnotice_id','=',$song_id)->join('epg','epg_id','=','epg.id')->select('program_id','programguide','offset_s','offset_e')->get();
        $epg = DB::table('advNoticeEpgPro')->where('advnotice_id','=',$song_id)->join('epg','epg_id','=','epg.id')->join('program','program_id','=','program.id')->select('name','programguide','offset_s','offset_e')->get();
        //$program_name = DB::table('programEpg')->where('program_id','=',$epg->id)->join('program','program_id','=','program.id')->select('name')->get();
        //Log::debug($epg);
        return view('epg',compact('allprogram','song_id','epg'));
    }

    public function postStoreepg(Request $request)
    {
        $rules = [
            'epg' => "required",
            'offset_s' => "required|numeric",
            'offset_e' => "required|numeric",
            'program' => "required",
        ];
        $validator = Validator::make($request->all(), $rules);   //验证输入信息的合法性
        if ($validator->passes()) {

            Log::debug("enter upload epg process");
            
            $epg = $request->get('epg');
            $program = $request->get('program');
            $song_id = $request->get('song_id');
            $offset_s = $request->get('offset_s');
            $offset_e = $request->get('offset_e');

            Log::debug($request->all());

            // TODO 判断新添加的S迹区间是否和DB中指定song_id的任意S迹区间都没有重合：区间重合算法 needed
            $all_epg = DB::table('advNoticeEpgPro')->where('advnotice_id',$song_id)->join('epg','epg_id', '=', 'epg.id')->select('offset_s', 'offset_e')->get();
            if($offset_s >$offset_e){
                return "片段起始时间比终止时间大，逻辑错误";
            }
            if($offset_s = $offset_e){
                return "片段起始时间与终止时间相等，逻辑错误";
            }
            for($all_int = 0; $all_int < count($all_epg); $all_int++){
                if(($offset_s >= $all_epg[$all_int]->offset_s) && ($offset_s < $all_epg[$all_int]->offset_e)){
                    return "起始时间重合了";
                }elseif(($offset_e > $all_epg[$all_int]->offset_s) && ($offset_e <= $all_epg[$all_int]->offset_e)){
                    return "终止时间重合了";
                }elseif(($offset_s == $all_epg[$all_int]->offset_s) && ($offset_e == $all_epg[$all_int]->offset_e)){
                    return "时间完全重了";
                }
            }
            $epg_obj = new Epg();
            $epg_obj->offset_s = $offset_s;
            $epg_obj->offset_e = $offset_e;
            $epg_obj->programguide = $epg;
            $epg_obj->save();
            $id = $epg_obj->id;
            $advepg_obj = new AdvanceNoticeEpgPro();
            $advepg_obj->advnotice_id = $song_id;
            $advepg_obj->epg_id = $id;
            $advepg_obj->program_id = $program;
            $advepg_obj->save();
            return Redirect::to('advnotice/new');
        } else {
            return "数据验证不通过";
        }
    }

    /**
     * 上传节目预告音频，显示已上传的节目预告信息
     */
    public function getNew()
    {
        $advnotice = DB::table('dejavu.songs')->join('radioAdvanceNotice','song_id','=','advnotice_id')->select('song_id','song_name','radio_id')->get();
        $radio = RadioStation::all();
        Log::debug($advnotice);
        //$advnotice = $advnotice->toArray();
        //var_dump($advnotice);
        return view('advnotice_upload', compact('advnotice', 'radio','radioAdvnotice'));
    }

    /**
     *
     */
    public function postUpload(Request $request)
    {
        if ($request->hasFile('advnotice')) 
        {
            $radio_obj = RadioStation::whereId($request->get('radio'))->select('id')->get();
        
        $radio_id = $radio_obj[0]->id;

        $uploaded_file = $request->file('advnotice');
        $saveToDir = storage_path('upload/audio');
        if (!is_dir($saveToDir)) {
            mkdir($saveToDir, 0755, true);
        }

        $adv_notice_name = $uploaded_file->getClientOriginalName();
        $uploaded_file->move($saveToDir, $adv_notice_name);
        $uploaded_notice_path = $saveToDir . DIRECTORY_SEPARATOR . $adv_notice_name;

        $this->dispatch(new indexRadioNotice($radio_id, $uploaded_notice_path));
        return Redirect::to('advnotice/new');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {

    }

}

?>