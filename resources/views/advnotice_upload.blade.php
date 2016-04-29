@extends('app')

@section('htmlheader_title')
    节目预告
@endsection

@section('main-content')
    <ol class="breadcrumb">
        <li><a href="{{ url('epgmanage')}}">节目单管理</a></li>
        <li class="active">节目预告</li>
    </ol>
    <div class="box box-primary">
        <div class="box-body">
            <form action="{{  url('advnotice/upload') }}" method="POST"  enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div>
                                    <label>上传一个节目预告，并选择所属电台</label>
                                    <input required id="audio" type="file" name="advnotice" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>电台</label>
                                <select class="form-control" name="radio">
                                    @for($i=0; $i< (count($radio)); $i++)
                                        <option value = {!!$radio[$i]['id']!!}> {{ $radio[$i]['name']}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <button  style="margin-top: 23%" type="submit" class="btn btn-primary" data-dismiss="modal">上传</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="box box-primary">
        <div class="box-header">
            <div class="row">
                <div class="col-sm-6 header">
                    <h3 class="box-title">已添加{{count($advnotice)}}段音频</h3>
                </div>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table class="table movieInfo table-bordered table-striped">
                <thead>
                <tr>
                    <th>songId</th>
                    <th>节目预告名称</th>
                    <th>节目单</th>
                </tr>
                </thead>
                <tbody>
                @foreach($advnotice as $adv)
                    <tr>
                        <td>
                            <p>{{$adv->song_id}}</p>
                        </td>
                        <td>
                            <p>{{$adv->song_name}}</p>
                        </td>
                        <td>
                            <form action="{{ url('advnotice/epg/'.$adv->song_id)}}" method="GET">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <input type="hidden" name="radio_id" value={{$adv->radio_id}}>
                                <button type="submit" class="btn btn-block btn-default" style="margin-bottom: 5%">新建节目单</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div><!-- /.box-body -->
    </div>
@endsection