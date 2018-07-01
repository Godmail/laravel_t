@extends('common.layouts')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">新增人员</div>
        <div class="panel-body">
            <form class="form-horizontal" method="post" action="{{url('user/save')}}">
                {{--姓名--}}
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">姓名</label>

                    <div class="col-sm-5">
                        <input type="text" name="User[name]" class="form-control" id="name" placeholder="请输入姓名">
                    </div>
                    <div class="col-sm-5">
                        <p class="form-control-static text-danger">姓名不能为空</p>
                    </div>
                </div>
                {{--部门--}}
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">部门</label>

                    <div class="col-sm-5">
                        <input type="text" name="User[partment]" class="form-control" id="name" placeholder="请输入部门">
                    </div>
                    <div class="col-sm-5">
                        <p class="form-control-static text-danger">部门不能为空</p>
                    </div>
                </div>
                {{--班种--}}
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">班种</label>

                    <div class="col-sm-5">
                        <select  name="User[typeX]" class="form-control">
                            <option value ="日">Volvo</option>
                            <option value ="甲">Saab</option>
                            <option value="乙">Opel</option>
                            <option value="丙">Audi</option>
                            <option value="丁">Audi</option>
                        </select>
                    </div>
                    <div class="col-sm-5">
                        <p class="form-control-static text-danger"></p>
                    </div>
                </div>
                {{--status--}}
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">状态</label>

                    <div class="col-sm-5">
                        <input type="text" name="User[status]" class="form-control" id="name" placeholder="请输入状态">
                    </div>
                    <div class="col-sm-5">
                        <p class="form-control-static text-danger">状态提示</p>
                    </div>
                </div>
                {{--synced--}}
                <div class="form-group">
                    <label for="age" class="col-sm-2 control-label">synced</label>

                    <div class="col-sm-5">
                        <input type="text" name="User[synced]"  class="form-control" id="age" placeholder="请输synced">
                    </div>
                    <div class="col-sm-5">
                        <p class="form-control-static text-danger">synced只能为整数</p>
                    </div>
                </div>
                {{--sectiome--}}
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">sectiome</label>

                    <div class="col-sm-5">
                        <input type="text" name="User[sectiome]" class="form-control" id="name" placeholder="请输入sectiome">
                    </div>
                    <div class="col-sm-5">
                        <p class="form-control-static text-danger">sectiome能为空</p>
                    </div>
                </div>
                {{--liyang--}}
                <div class="form-group">
                    <label class="col-sm-2 control-label">立洋</label>

                    <div class="col-sm-5">
                        <label class="radio-inline">
                            <input type="radio" name="User[liyang]" value="0"> 否
                        </label>
                        <label class="radio-inline" >
                            <input type="radio" name="User[liyang]" value="1"> 是
                        </label>
                    </div>
                    <div class="col-sm-5">
                        <p class="form-control-static text-danger">请选择班次</p>
                    </div>
                </div>
                {{--islw--}}
                <div class="form-group">
                    <label class="col-sm-2 control-label">劳务</label>

                    <div class="col-sm-5">
                        <label class="radio-inline">
                            <input type="radio" name="User[islw]" value="0"> 否
                        </label>
                        <label class="radio-inline" >
                            <input type="radio" name="User[islw]" value="1"> 是
                        </label>
                    </div>
                    <div class="col-sm-5">
                        <p class="form-control-static text-danger">请选择班次</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-primary">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop