@extends('layouts.app')
@section('title','支付方式展示')
@section('content')
    @include('UEditor::head');
    <div class="wrapper">
        <!--左侧导航开始-->
        @include('public.left')
        <div class="page-content">
            <div class="content">
                @foreach($pay_data as $v)
                    <form class="layui-form layui-form-pane" method="post" action="/pay/pay_edit_do">
                        <input type="hidden" name="pay_id" value="{{$v->pay_id}}">
                        <div class="layui-form-item">
                            <label class="layui-form-label">支付方式</label>
                            <div class="layui-input-block">
                                <input type="text" value="{{$v->pay_name}}" name="pay_name" autocomplete="off" placeholder="请输入" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <button class="layui-btn" lay-submit="" lay-filter="demo2">修改</button>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
@endsection