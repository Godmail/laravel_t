@extends('common.layouts')

@section('content')
    @include('common.validator')
    <div class="panel panel-default">
        <div class="panel-heading">新增人员</div>
        <div class="panel-body">
            @include('user._form')
        </div>
    </div>
@stop