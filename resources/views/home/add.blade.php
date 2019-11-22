@extends('layouts.app')
@section('title','在线教育系统')

@section('content')
    @include('public/left')
    <form class="layui-form layui-form-pane" action="{{url('home/add_do')}}" method="post">

            <input type="hidden" name="class_id" value="{{$class_id}}">

                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">选择章节</label>
                        <div class="layui-input-inline">
                            <select name="catalog_id">
                                @foreach($class as $vv)
                                    <optgroup label="{{$vv->class_name}}">
                                        @foreach($catalog as $v)
                                            <option value="{{$v->catalog_id}}">{{$v->catalog_name}}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                    </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">作业内容 :</label>
            <div class="layui-input-block">
                <textarea name="job_name" placeholder="请输入内容" class="layui-textarea"></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <button class="layui-btn" lay-submit="" lay-filter="demo2">添加</button>
        </div>
    </form>
@endsection