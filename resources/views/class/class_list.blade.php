@extends('layouts.app')
@section('title','课程展示')
@section('content')
    <div class="wrapper">
        <!--左侧导航开始-->
        @include('public.left')
        <div class="page-content">
            <div class="content">
                <form class="layui-form xbs" action="" >
                    <div class="layui-form-pane" style="text-align: center;">
                        <div class="layui-form-item" style="display: inline-block;">
                            <div class="layui-input-inline">
                                <input type="text" name="username"  placeholder="请输入分类名" autocomplete="off" class="layui-input">
                            </div>
                            <div class="layui-input-inline" style="width:80px">
                                <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                            </div>
                        </div>
                    </div>
                </form>
                <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button><a href="/class/class_add" class="layui-btn" ><i class="layui-icon">&#xe608;</i>添加</a><span class="x-right" style="line-height:40px">共有数据： 条</span></xblock>
                <table class="layui-table">
                    <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="" value="">
                        </th>
                        <th>ID</th>
                        <th>课程名</th>
                        <th>讲师名</th>
                        <th>分类</th>
                        <th>总课时</th>
                        <th>课程图片</th>
                        <th>课程介绍</th>
                        <th>是否授课</th>
                        <th>是否付费</th>
                        <th>课程价格</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    @foreach($class_info as $v)
                    <tr>
                        <th>
                            <input type="checkbox" name="" value="">
                        </th>
                        <td>{{$v->class_id}}</td>
                        <td>{{$v->class_name}}</td>
                        <td>{{$v->teacher_name}}</td>
                        <td>{{$v->cate_name}}</td>
                        <td>{{$v->class_num}}分钟</td>
                        <td><img src="/{{$v->class_img}}" alt="暂无图片" width="80px"></td>
                        <td>{{str_limit($v->class_desc,20,'....')}}</td>
                        <td>
                            @if($v->class_status==1)
                                <span class="layui-btn layui-btn-normal layui-btn-mini" >
                                已授课
                            </span>
                            @else
                                <span class="layui-btn layui-btn-danger layui-btn-mini" >
                                已停课
                            </span>
                            @endif
                        </td>
                        <td>
                            @if($v->is_free==1)
                                <span class="layui-btn layui-btn-normal layui-btn-mini" >
                                免费
                            </span>
                            @else
                                <span class="layui-btn layui-btn-normal layui-btn-mini" >
                                付费
                            </span>
                            @endif
                        </td>
                        <td>
                            @if($v->is_free==1)
                                0元
                            @else
                                {{$v->class_price}}元
                            @endif
                        </td>
                        <td class="td-manage"  >
                            <a title="编辑" href="/class/class_edit/{{$v->class_id}}" onclick="member_edit('编辑','member-edit.html','4','','510')"
                               class="ml-5" style="text-decoration:none">
                                <i class="layui-icon">&#xe642;</i>
                            </a>
                            <a title="删除" class="del"   href="/class/class_del/{{$v->class_id}}"
                               style="text-decoration:none" class_id="{{$v->class_id}}">
                                <i class="layui-icon">&#xe640;</i>
                            </a>
                            <a style="text-decoration:none"  onclick="member_password('评论','member-password.html','10001','600','400')"
                               href="/class/class_eva/{{$v->class_id}}" title="评论">
                                <i class="layui-icon">&#xe611;</i>
                            </a>

                            <a style="text-decoration:none"  onclick="member_password('章节','member-password.html','10001','600','400')"
                               href="{{url('lect/directory_list')}}?class_id={{$v->class_id}}" title="章节">
                                <i class="layui-icon">&#xe622;</i>
                            </a>
                            <a style="text-decoration:none"  onclick="member_password('作业','member-password.html','10001','600','400')"
                               href="{{url('home/index')}}?class_id={{$v->class_id}}" title="作业">
                                <i class="layui-icon">&#xe609;</i>
                            </a>
                            <a style="text-decoration:none"  onclick="member_password('问答','member-password.html','10001','600','400')"
                               href="{{url('questions/questions_list')}}?class_id={{$v->class_id}}" title="问答">
                                <i class="layui-icon">&#xe600;</i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

@endsection