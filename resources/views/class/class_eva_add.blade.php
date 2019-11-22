@extends('layouts.app')
@section('title','评论课程')
@section('content')
    <div class="wrapper">
        <!--左侧导航开始-->
        @include('public.left')
        <div class="page-content">
            <div class="content">
                <form class="layui-form layui-form-pane" action="/class/class_eva_add_do" method="post">
                    <div class="layui-form-item">
                        <label class="layui-form-label">课程名称</label>
                        <div class="layui-input-block">
                            @foreach($data as $v)
                                <input type="text" name="" readonly autocomplete="off" value="{{$v['class_name']}}" class="layui-input">
                                <input type="hidden" name="class_id" value="{{$v['class_id']}}">
                                @endforeach
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">评论内容</label>
                        <div class="layui-input-block">
                            <input type="text" name="e_desc" autocomplete="off" placeholder="请输入评论" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <button class="layui-btn" lay-submit="" lay-filter="demo2">评论</button>
                    </div>
                </form>
            </div>
        </div>

@endsection