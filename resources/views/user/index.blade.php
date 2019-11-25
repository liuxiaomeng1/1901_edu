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
                        <input type="checkbox" name="" value="">
                    </th>
                    <th>
                        用户姓名
                    </th>
                    <th>
                        用户年龄
                    </th>
                    <th>
                        用户性别
                    </th>
                    <th>
                        用户状态
                    </th>
                    <th>
                        操作
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $v)
                    <tr>
                        <td>
                            <input type="checkbox" value="1" name="">
                        </td>
                        <td>
                            {{$v['u_name']}}
                        </td>
                        <td>
                            {{$v['u_age']}}
                        </td>
                        @if($v['u_sex']==1)
                        <td >
                            男
                        </td>
                        @else
                        <td>
                            女
                        </td>
                        @endif
                        @if($v['u_status']==0)
                        <td>
                            普通用户
                        </td>
                        @elseif($v['u_status']==1)
                            <td>
                                讲师
                            </td>
                        @endif
                        <td>
                            <a style="text-decoration:none"  onclick="member_password('升级','member-password.html','10001','600','400')"
                               href="{{url('user/index_do')}}?u_id={{$v['u_id']}}" title="升级">
                                <i class="layui-icon">&#xe609;</i>
                            </a>

                            <a style="text-decoration:none"  onclick="member_password('收藏夹','member-password.html','10001','600','400')"
                               href="{{url('collection/index')}}?u_id={{$v['u_id']}}" title="收藏夹">
                                <i class="layui-icon">&#xe622;</i>
                            </a>
                            <a style="text-decoration:none"  onclick="member_password('笔记','member-password.html','10001','600','400')"
                               href="{{url('class/note_index')}}?u_id={{$v['u_id']}}" title="笔记">
                                <i class="layui-icon">&#xe642;</i>
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