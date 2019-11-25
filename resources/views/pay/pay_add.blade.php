@extends('layouts.app')
@section('title','课程添加')
@section('content')
    @include('UEditor::head');
    <div class="wrapper">
        <!--左侧导航开始-->
        @include('public.left')
        <div class="page-content">
            <div class="content">
                <form class="layui-form layui-form-pane" method="post" action="/pay/pay_add_do">
                    <div class="layui-form-item">
                        <label class="layui-form-label">支付方式</label>
                        <div class="layui-input-block">
                            <input type="text" name="pay_name" autocomplete="off" placeholder="请输入" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <button class="layui-btn" lay-submit="" lay-filter="demo2">添加</button>
                    </div>
                </form>
            </div>
        </div>
@endsection