@extends('app')

@section('htmlheader_title')
    节目预告
@endsection
@section('main-content')
    <ol class="breadcrumb">
        <li><a href="{{ url('epgmanage')}}">节目单管理</a></li>
        <li class="active">检索节目单</li>
    </ol>
    <div class="box box-primary">
        <div class="box-body">
            <form action="{{  url('fingerprint/search') }}" method="POST"  enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div>
                                    <label>上传一个节目预告片段</label>
                                    <input required id="audio" type="file" name="fingerprint" >
                                </div>
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
@endsection