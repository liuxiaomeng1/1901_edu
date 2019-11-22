@extends('layouts.app')
@section('title','课程分类展示')
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
                <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button><button class="layui-btn" onclick="member_add('添加用户','member-add.html','600','500')"><i class="layui-icon">&#xe608;</i>添加</button><span class="x-right" style="line-height:40px">共有数据：{{$cate_num}} 条</span></xblock>
                <table class="layui-table">
                    <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="" value="">
                        </th>
                        <th>ID</th>
                        <th>用户名</th>
                        <th>加入时间</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cate_data as $v)
                    <tr>
                        <td>
                            <input type="checkbox" value="1" name="">
                        </td>
                        <td>{{$v['cate_id']}}</td>
                        <td><?php
                            echo str_repeat("一一",$v['level']);
                            ?>{{$v['cate_name']}}</td>
                        <td><?php echo date('Y-m-d H:i:s',$v['add_time'])?></td>
                        <td class="td-status">
                            @if($v['is_del']==1)
                                <span class="layui-btn layui-btn-normal layui-btn-mini">
                                已启用
                            </span>
                                @else
                                <span class="layui-btn layui-btn-danger layui-btn-mini" >
                                已停用
                            </span>
                            @endif
                        </td>
                        <td class="td-manage">
                            <a style="text-decoration:none" onclick="member_stop(this,'10001')" href="javascript:;" title="停用">
                                <i class="layui-icon">&#xe601;</i>
                            </a>
                            <a title="编辑" href="javascript:;" onclick="member_edit('编辑','member-edit.html','4','','510')"
                               class="ml-5" style="text-decoration:none">
                                <i class="layui-icon">&#xe642;</i>
                            </a>
                            <a title="删除" href="javascript:;" onclick="member_del(this,'1')"
                               style="text-decoration:none">
                                <i class="layui-icon">&#xe640;</i>
                            </a>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
@endsection