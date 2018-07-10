@extends('common.layouts')

@section('content')
    @include('common.validator')
    <div class="panel panel-default">
        <div class="panel-heading">新增人员</div>
        <div class="panel-body">
            <form class="form-horizontal" method="post" action="">
                {{--姓名--}}
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">姓名</label>

                    <div class="col-sm-5">
                        <input type="text" name="User[name]" class="form-control" id="name" value="{{old('User')['name']}}" placeholder="请输入姓名">
                    </div>
                    <div class="col-sm-5">
                        <p class="form-control-static text-danger">{{$errors->first('User.name')}}</p>
                    </div>
                </div>
                {{--部门--}}
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">部门</label>

                    <div class="col-sm-5">
                        <input type="text" name="User[partment]" class="form-control" id="name"  value="{{old('User')['partment']}}" placeholder="请输入部门">
                    </div>
                    <div class="col-sm-5">
                        <p class="form-control-static text-danger">{{$errors->first('User.partment')}}</p>
                    </div>
                </div>
                {{--班种--}}
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">班种</label>

                    <div class="col-sm-5">
                        <select  name="User[type]" class="form-control">
                            @foreach($user->type() as $ind=> $val )
                            <option value ="{{$ind}}">{{$val}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-5">
                        <p class="form-control-static text-danger">{{$errors->first('User.type')}}</p>
                    </div>
                </div>
                {{--status--}}
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">状态</label>

                    <div class="col-sm-5">
                        <input type="text" name="User[status]" class="form-control" id="name" placeholder="请输入状态">
                    </div>
                    <div class="col-sm-5">
                        <p class="form-control-static text-danger">{{$errors->first('User.status')}}</p>
                    </div>
                </div>
                {{--synced--}}
                <div class="form-group">
                    <label for="age" class="col-sm-2 control-label">synced</label>

                    <div class="col-sm-5">
                        <input type="text" name="User[synced]"  class="form-control" id="age" placeholder="请输synced">
                    </div>
                    <div class="col-sm-5">
                        <p class="form-control-static text-danger">{{$errors->first('User.synced')}}</p>
                    </div>
                </div>
                {{--sectime--}}
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">sectime</label>

                    <div class="col-sm-5">
                        <input type="text" name="User[sectime]" class="form-control" id="name" placeholder="请输入sectime">
                    </div>
                    <div class="col-sm-5">
                        <p class="form-control-static text-danger">{{$errors->first('User.sectime')}}</p>
                    </div>
                </div>
                {{--liyang--}}
                <div class="form-group">
                    <label class="col-sm-2 control-label">立洋</label>

                    <div class="col-sm-5">
                        <label class="radio-inline">
                            <input type="radio" name="User[liyang]" value="0" checked> 否
                        </label>
                        <label class="radio-inline" >
                            <input type="radio" name="User[liyang]" value="1"> 是
                        </label>
                    </div>
                    <div class="col-sm-5">
                        <p class="form-control-static text-danger">{{$errors->first('User.liyang')}}</p>
                    </div>
                </div>
                {{--islw--}}
                <div class="form-group">
                    <label class="col-sm-2 control-label">劳务</label>

                    <div class="col-sm-5">
                        <label class="radio-inline">
                            <input type="radio" name="User[islw]" value="0" checked> 否
                        </label>
                        <label class="radio-inline" >
                            <input type="radio" name="User[islw]" value="1"> 是
                        </label>
                    </div>
                    <div class="col-sm-5">
                        <p class="form-control-static text-danger">{{$errors->first('User.islw')}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-primary">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop