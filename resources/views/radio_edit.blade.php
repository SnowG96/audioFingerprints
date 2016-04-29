{{-- 电台编辑页面--}}
@extends('app')

@section('htmlheader_title')
    电台管理
@endsection

@section('main-content')
        <!-- Content Header (Page header) -->
    <ol class="breadcrumb">
        <li><a href="{{ url('radiostation/show') }}">电台管理</a></li>
        <li class="active">编辑电台信息</li>
    </ol>
    <section class="content">
        <!-- 基本信息 -->
        <div class="box box-primary radio_info">
            <div class="box-header with-border">
                <h3 class="box-title">电台基本信息</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="{{  url('radiostation/editmoviest') }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" name="id" value="{{$radio_info[0]['id']}}">
                    <div class="row">
                        <div class="col-sm-10 radio_new">
                            <!-- text input -->
                            <div class="form-group">
                                <label>电台名</label>
                                <input type="text" class="form-control" value="{{$radio_info[0]['name']}} " name="name">
                            </div>
                            <div class="form-group">
                                <label>电台简介</label>
                                <input type="text" class="form-control" value="{{$radio_info[0]['introduction']}} " name="introduction">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="pull-right">
                            <a href="{{ url('radiostation/show') }}" class="btn btn-default">取消</a>
                            <button type="submit" class="btn btn-primary">确定</button>
                        </div>
                    </div>
                    <!-- /.box-footer -->
                    @foreach ($errors->all() as $error)
                        <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                    @endforeach
                </form>
            </div>
            <!-- /.box-body -->
        </div>
    </section><!-- /.content -->
@endsection