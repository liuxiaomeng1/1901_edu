@extends('layouts.app')
@section('title','课程评论')
@section('content')

    <div class="wrapper">
        <!--左侧导航开始-->
        @include('public.left')
        <div class="page-content">
            <div class="content">
                @foreach($class as $vv)
                   <h1 style="color: #8a234e"> 课程 :   {{$vv['class_name']}}</h1>
                    <a href="/class/class_eva_add/{{$vv['class_id']}}"> 评论 </a>
                @endforeach
                        <table class="layui-table">
                            <thead>
                            <tr>
                                <th>用户名1</th>
                                <th>评论</th>
                                <th>时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            @foreach($eva_data as $v)
                                <tr>
                                    <th>{{$v['u_name']}}</th>
                                    <th>{{$v['e_desc']}}</th>
                                    <th><?php echo date('Y-m-d H:i:s',$v['create_time'])?></th>
                                    <th>
                                        <a title="删除" class="del"   href="/class/class_eva_del/{{$v['e_id']}}"
                                           style="text-decoration:none" >
                                            <i class="layui-icon">&#xe640;</i>
                                        </a>
                                        <a style="text-decoration:none"  onclick="member_password('评论','member-password.html','10001','600','400')"
                                           href="/class/class_eva_eva/{{$v['e_id']}}" title="评论">
                                            <i class="layui-icon">&#xe606;</i>
                                        </a>
                                    </th>
                                </tr>
                            @endforeach
                        </table>
            </div>
        </div>
@endsection