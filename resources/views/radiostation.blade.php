@extends('app')
@section('htmlheader_title')
    电台管理
@endsection
@section('main-content')
    <ol class="breadcrumb">
        <li class="active"> 电台管理</li>
    </ol>
    <div class="box box-primary">
        <div class="box-header">
            <div class="row">
                <div class="col-sm-2 header">
                    <h3 class="box-title">共{{count($radio)}}个电台</h3>
                </div>
                <div class="col-sm-2">
                    <a href="{{ url('radiostation/new') }}" class="btn btn-block btn-primary">
                        新建电台
                    </a>
                </div>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table radioInfo table-bordered table-striped">
                <thead>
                <tr>
                    <th>电台信息</th>
                    <th>节目</th>
                </tr>
                </thead>
                <tbody>
                @for ($i=0; $i< (count($radio)); $i++)
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-sm-10">
                                    <h4 class="attachment-heading">{{ $radio[$i]['name'] }}</h4>
                                    <p>{{ $radio[$i]['introduction']}}</p>
                                </div>
                                <div class="col-sm-2">
                                    <form action="{{ url('radiostation/editradio/'.$radio[$i]['id']) }}" method="GET">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                        <button type="submit" class="btn btn-block btn-default" style="margin-bottom: 5%">
                                            编辑
                                        </button>
                                    </form>
                                    <button id="id" onclick="getId({{ $radio[$i]['id'] }})" data-toggle="modal" data-target="#myModal" type="submit" class="btn btn-block btn-default btn-sm">
                                        删除
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-sm-6">
                                    <form action="{{ url('radiostation/program/'.$radio[$i]['id']) }}" method="GET">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                        <button type="submit" class="btn btn-block btn-default" style="margin-bottom: 5%">查看电台节目</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endfor
                </tbody>
            </table>
        </div>
    </div>

    <!--模态对话框-->
    <!-- Button trigger modal
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">电台管理</h4>
                </div>
                <div class="modal-body">
                    您确定要删除这个电台吗？
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取 消</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="radioDelete()">确 定
                    </button>

                </div>
            </div>
        </div>
    </div>
@endsection