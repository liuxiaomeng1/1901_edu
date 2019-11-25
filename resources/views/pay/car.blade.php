@extends('layouts.app')
@section('title','购物车')
@section('content')
    <div class="wrapper">
        <!--左侧导航开始-->
        @include('public.left')
        <div class="page-content">
            <div class="content">
                <table class="layui-table">
                    <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="" value="">
                        </th>
                        <th>订单号</th>
                        <th>课程名</th>
                        <th>支付方式</th>
                        <th>价格</th>
                        <th>订单状态</th>
                        <th>操作</th>

                    </tr>
                    </thead>
                    @foreach($car as $v)
                        <tr>
                            <th>
                                <input type="checkbox" name="" value="">
                            </th>
                            <td>{{$v['order_mark']}}</td>
                            <td>{{$v['class_name']}}</td>
                                @if ($v['pay_id'] == 0)
                                    <td>未支付</td>
                                @else
                                    <td>{{$v['pay_name']}}</td>
                                @endif
                            <td>{{$v['pay_price']}}元</td>
                            @if($v['pay_status'] == 0)
                                <td>未支付</td>
                            @else
                                <td>已支付</td>
                            @endif
                            <td class="td-manage"  >
                                <a title="删除" class="del"   href="{{url('buy/buy_del')}}?order_id={{$v['order_id']}}"
                                   style="text-decoration:none" >
                                    <i class="layui-icon">&#xe640;</i>
                                </a>
                                <a style="text-decoration:none"  onclick="member_password('购买','member-password.html','10001','600','400')"
                                   href="{{url('buy/buy_pay')}}?order_id={{$v['order_id']}}" title="购买">
                                    <i class="layui-icon">&#xe611;</i>
                                </a>

                            </td>
                        </tr>
                    @endforeach
                </table>


</div>
</div>

@endsection