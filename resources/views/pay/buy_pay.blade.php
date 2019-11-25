@extends('layouts.app')
@section('title','购物车')
@section('content')
    <div class="wrapper">
        <!--左侧导航开始-->
        @include('public.left')
        <div class="page-content">
            <div class="content">
                <form class="layui-form layui-form-pane" action="/buy/buy_pay_do" method="post">
                    <input type="hidden" name="order_id" value="{{$order_id}}">
                        <div class="layui-form-item" pane="">
                            <label class="layui-form-label">选择支付方式</label>
                            <div class="layui-input-block">
                                @foreach($payment as $v)
                                <input type="radio" name="pay_id" value="{{$v->pay_id}}" title="{{$v->pay_name}}" checked="">
                                @endforeach
                                    <div class="layui-form-item">
                                        <button class="layui-btn" lay-submit="" lay-filter="demo2">购买</button>
                                    </div>

                            </div>
                        </div>

                </form>

            </div>
            </div>
@endsection