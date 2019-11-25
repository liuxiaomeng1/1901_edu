@extends('layouts.app')
@section('title','支付方式展示')
@section('content')
    @include('UEditor::head');
    <div class="wrapper">
        <!--左侧导航开始-->
        @include('public.left')
        <div class="page-content">
            <div class="content">

                <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button><a href="/pay/pay_add" class="layui-btn" ><i class="layui-icon">&#xe608;</i>添加</a><span class="x-right" style="line-height:40px">共有数据： 条</span></xblock>
                <table class="layui-table">
                    <thead>
                    <tr>

                        <th>课程名</th>

                        <th>操作</th>
                    </tr>
                    </thead>
                    @foreach($pay_data as $v)
                        <tr>

                            <td>{{$v->pay_name}}</td>

                            <td class="td-manage"  >
                                <a title="编辑" href="{{url('pay/pay_edit')}}?pay_id={{$v->pay_id}}" onclick="member_edit('编辑','member-edit.html','4','','510')"
                                   class="ml-5" style="text-decoration:none">
                                    <i class="layui-icon">&#xe642;</i>
                                </a>
                                <a title="删除" class="del"   href="{{url('pay/pay_del')}}?pay_id={{$v->pay_id}}"
                                   style="text-decoration:none">
                                    <i class="layui-icon">&#xe640;</i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
@endsection