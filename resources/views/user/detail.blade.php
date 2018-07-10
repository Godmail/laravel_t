@extends('common.layouts')
@section('content')
        <!-- 自定义内容区域 -->
        <div class="panel panel-default">
    <div class="panel-heading">学生详情</div>

    <table class="table table-bordered table-striped table-hover ">
        <tbody>
        <tr>
            <td width="50%">ID</td>
            <td>{{$user->id}}</td>
        </tr>
        <tr>
            <td>姓名</td>
            <td>{{$user->name}}</td>
        </tr>
        <tr>
            <td>部门</td>
            <td>{{$user->partment}}</td>
        </tr>
        <tr>
            <td>参保时间</td>
            <td>{{$user->sectime}}</td>
        </tr>
        <tr>
            <td>班种</td>
            <td>{{$user->typeX($user->type)}}</td>
        </tr>
        <tr>
            <td>状态</td>
            <td>{{$user->status}}</td>
        </tr>
        <tr>
            <td>同步状态</td>
            <td>{{$user->synced}}</td>
        </tr>
        <tr>
            <td>剩余</td>
            <td>{{$user->remain}}</td>
        </tr>
        <tr>
            <td>剩余2</td>
            <td>{{$user->remain2}}</td>
        </tr>
        <tr>
            <td>薪价同步状态</td>
            <td>{{$user->xinsynced}}</td>
        </tr>
        <tr>
            <td>是否立洋</td>
            <td>{{$user->judge($user->liyang)}}</td>
        </tr>
        <tr>
            <td>是否劳务</td>
            <td>{{$user->judge($user->islw)}}</td>
        </tr>
        <tr>
            <td>添加日期</td>
            <td>{{$user->created_at}}</td>
        </tr>
        <tr>
            <td>最后修改</td>
            <td>{{$user->updated_at}}</td>
        </tr>
        </tbody>
    </table>
</div>
    @stop