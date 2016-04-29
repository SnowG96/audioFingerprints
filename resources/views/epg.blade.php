{{--s迹管理页面--}}
@extends('app')

@section('htmlheader_title')
    节目预告
@endsection

@section('main-content')
    <ol class="breadcrumb">
        <li><a href="#">节目单管理</a></li>
        <li>节目预告</li>
        <li class="active">新建节目单</li>
    </ol>
    <div class="box box-primary">
        <div class="box-header">
            <h3>新建节目单</h3>
        </div>
        <div class="box-body">
            <form action="{{  url('advnotice/storeepg') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" name="song_id" value={!!$song_id!!}>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <p>输入节目单</p>
                                <textarea name="epg" class="form-control" column="60" rows="5" required></textarea>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <select class="form-control" name="program">
                                    @for($i=0; $i< (count($allprogram)); $i++)
                                        <option value = {!!$allprogram[$i]->program_id!!}> {{ $allprogram[$i]->name}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input required class="form-control" name="offset_s" placeholder="输入片段起始时间位置">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input required class="form-control" name="offset_e" placeholder="输入片段结束时间">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                            <button type="submit" class="btn btn-primary">保存</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
        <div class="box box-primary">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-6 header">
                        <h3 class="box-title">已添加{{count($epg)}}个节目单</h3>
                    </div>
                </div>
            </div><!-- /.box-header -->
        <div class="box-body">
            <table class="table epgInfo table-bordered table-striped">
                <thead>
                <tr>
                    <th>节目名</th>
                    <th>节目单内容</th>
                    <th>起始时间</th>
                    <th>结束时间</th>
                </tr>
                </thead>
                <tbody>
                @foreach($epg as $epg)
                    <tr>
                        <td>
                            <p>{{$epg->name}}</p>
                        </td>
                        <td>
                            <p>{{$epg->programguide}}</p>
                        </td>
                        <td>
                            <p>{{$epg->offset_s}}秒</p>
                        </td>
                        <td>
                            <p>{{$epg->offset_e}}秒</p>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        </div>
@endsection
