@extends('common.layouts')
@section('content')
    @include('common/message')
    <!-- 自定义内容区域 -->
    <div class="panel panel-default">
        <div class="panel-heading">人员列表</div>
        <table class="table table-striped table-hover table-responsive">
            <thead>
            <tr>
                <th>ID</th>
                <th>姓名</th>
                <th>部门</th>
                <th>班种</th>
                <th>社保时间</th>
                <th width="120">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->partment}}</td>
                        <td>{{$user->typeX($user->type)}}</td>
                        <td>{{$user->sectime}}</td>
                        <td>
                            <a href="{{url('user/detail',['id'=>$user->id,])}}">详情</a>
                            <a href="{{url('user/update',['id'=>$user->id,])}}">修改</a>
                            <a href="{{url('user/delete',['id'=>$user->id,])}}">删除</a>
                        </td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- 分页  -->
    <div>
        <div class="pull-right">
            {{$users->render()}}
        </div>
    </div>
@stop