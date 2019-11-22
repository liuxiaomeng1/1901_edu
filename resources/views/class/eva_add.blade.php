@extends('layouts.app')
@section('title','追加评论')
@section('content')
    <div class="wrapper">
        <!--左侧导航开始-->
        @include('public.left')
        <div class="page-content">
            <div class="content">
                <form class="layui-form layui-form-pane" action="/class/eva_add_do" method="post">
                    <div class="layui-form-item">
                        <label class="layui-form-label">追加评论</label>
                        <div class="layui-input-block">
                            @foreach($eva as $v)
                                <input type="text" name="" readonly autocomplete="off" value="{{$v['e_desc']}}" class="layui-input">
                                <input type="hidden" name="p_id" value="{{$v['e_id']}}">
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