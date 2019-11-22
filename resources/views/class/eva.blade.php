@extends('layouts.app')
@section('title','评论详情')
@section('content')
    <div class="wrapper">
        <!--左侧导航开始-->
        @include('public.left')
        <div class="page-content">
            <div class="content">
                @foreach($eva as $v)
                    <h1>{{$v['e_desc']}}</h1>
                    <a href="/class/eva_add/{{$v['e_id']}}">追加评论</a>
                @endforeach

                <table class="layui-table">
                    @foreach($eva_p as $vv)
                    <tr>
                        <td>{{$vv['u_name']}}</td>
                        <td>{{$vv['e_desc']}}</td>
                        <td><?php echo date('Y-m-d H:i:s',$v['create_time'])?></td>
                        <td><a title="删1除" class="del"   href="/class/class_eva_del/{{$vv['e_id']}}"
                               style="text-decoration:none" >
                                <i class="layui-icon">&#xe640;</i>
                            </a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

@endsection