@extends('layouts.app')
@section('title','在线教育系统')

@section('content')
    @include('public/left')
    <div class="page-content">
        <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form xbs" action="" >
                <div class="layui-form-pane" style="text-align: center;">
                    <div class="layui-form-item" style="display: inline-block;">

                    </div>
                </div>
            </form>
            <span class="x-right" style="line-height:40px">共有数据：{{$count}}条</span></xblock>
            <table class="layui-table">
                <thead>
                <tr>

                    <th>
                        收藏夹名称
                    </th>
                    <th>
                        收藏夹数量
                    </th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $v)
                <tr>

                    <td>
                        {{$v->coll_name}}
                    </td>
                    <td >
                        {{$v->coll_num}}
                    </td>
                    <td class="td-manage"  >
                        <a title="查看" href="{{url('collection/coll_index')}}?coll_id={{$v->coll_id}}&u_id={{$v->u_id}}" onclick="member_edit('查看','member-edit.html','4','','510')"
                           class="ml-5" style="text-decoration:none">
                            <i class="layui-icon">&#xe622;</i>
                        </a>
                        <a title="删除" href="{{url('collection/del')}}?coll_id={{$v->coll_id}}&u_id={{$v->u_id}}" onclick="member_edit('删除','member-edit.html','4','','510')"
                           class="ml-5" style="text-decoration:none">
                            <i class="layui-icon">&#xe622;</i>
                        </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <!-- 右侧内容框架，更改从这里结束 -->
        </div>
    </div>
    <!-- 右侧主体结束 -->
@endsection