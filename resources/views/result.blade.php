@extends('app')

@section('htmlheader_title')
    节目预告
@endsection
@section('main-content')
    <ol class="breadcrumb">
        <li><a href="{{ url('epgmanage')}}">节目单管理</a></li>
        <li class="active">检索节目单结果</li>
    </ol>
    <div class="box box-primary">
        <div class="box-body">
            <table class="table programInfo table-bordered table-striped">
                <thead>
                <tr>
                    <th>节目名</th>
                    <th>节目单</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-sm-10">
                                    <h4>{!! $epg->name!!}</h4>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-sm-10">
                                    <h4>{!! $epg->programguide!!}</h4>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection