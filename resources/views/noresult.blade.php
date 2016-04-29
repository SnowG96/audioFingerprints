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
            <p>{!!$message!!} </p>
        </div>
    </div>
@endsection