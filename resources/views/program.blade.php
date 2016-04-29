{{-- 电台节目管理界面--}}
@extends('app')

@section('htmlheader_title')
    电台管理
@endsection

@section('main-content')
        <!-- Content Header (Page header) -->
    <ol class="breadcrumb" xmlns="http://www.w3.org/1999/html">
        <li><a href="{{ url('radiostation/show') }}">电台管理</a></li>
        <li class="active">查看电台节目</li>
    </ol>
    <section class="content">
        <!-- 基本信息 -->
        <div class="box box-primary program_info">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-2 header">
                        <h3 class="box-title">共{{count($programs)}}个节目</h3>
                    </div>
                </div>
            </div>
            <table class="table programInfo table-bordered table-striped">
                <thead>
                <tr>
                    <th>节目名</th>
                    <th>节目播出时间</th>
                    <th>节目时长</th>
                </tr>
                </thead>
                <tbody>
                @for($i=0; $i< (count($programs)); $i++)
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-sm-10">
                                    <h4>{{ $programs[$i]->name }}</h4>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-sm-10">
                                    <h4>{{ $programs[$i]->broadcasttime }}</h4>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-sm-10">
                                    <h4>{{ $programs[$i]->duration }}分钟</h4>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endfor
                </tbody>
            </table>
        </div>
    </section><!-- /.content -->
@endsection