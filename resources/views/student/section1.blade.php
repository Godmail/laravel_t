@extends('layouts')

@section('header')
    @parent
    header
@stop

@section('sidebar')

    sidebar
@stop

@section('content')
    content
{{--
    <!-- 1、模板中输出PHP变量 -->
    {{$name}}</p>
    <!-- 2、模板中调用PHP代码 -->
    {{time()}}</p>
    {{date('Y-m-d H:i:s' ,time())}}</p>
    {{in_array($name,$arr)?'true':'false'}}</p>

    <!-- PHP isset比较 有短语法 -->
    {{isset($name)?$name:'default'}}</p>
    {{$name2 or 'default'}}</p>

    <!-- 3、原样输出 -->
    @{{$name}}

    {{-- 4、模板注释 --}}
    {{--啦啦啦--}}

    {{--5、引入 子视图 include--}}
    {{--@include('student.common1',['message'=>'我是错误信息'])--}}
    {{--@if($name=='Godmail')--}}
        {{--I'm Godmail--}}
    {{--@elseif($name=='Godmail2')--}}
        {{--I'm Godmail2--}}
    {{--@else--}}
        {{--Who am I?--}}
    {{--@endif--}}
    {{--</p>--}}
    {{--@unless($name=='Godmail')--}}
        {{--I'm not Godmail--}}
    {{--@endunless--}}

    {{--@for($i=0;$i<10;$i++)--}}
        {{--{{$i}}</p>--}}
    {{--@endfor--}}

    {{--@foreach($students as $student)--}}
    {{--<p>{{$student->name}}</p>--}}
    {{--@endforeach--}}
    <a href="{{url('url')}}"> URL</a><p/>
    <a href="{{action('StudentController@urlTest')}}"> action</a><p/>
    <a href="{{route('url1')}}"> route</a><p/>

@stop