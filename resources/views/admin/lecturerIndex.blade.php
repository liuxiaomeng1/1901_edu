@extends('layouts.app')
@section('title','在线教育系统')


@section('content')
    @include('public/left')

     <!-- 右侧主体开始 -->
     <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
    <form action="">
        <!-- 搜索讲师：<input type="text" name="lect_name" value="{{$req}}">
        <button>搜索</button> -->
        <div class="layui-input-inline">
                      <input type="text" name="lect_name" value="{{$req}}" placeholder="请输入讲师名称" autocomplete="off" class="layui-input">
                    </div>

        <div class="layui-input-inline" style="width:80px">
                <button class="layui-btn"  lay-submit="" lay-filter="sreach">
                    <i class="layui-icon">&#xe615;</i>
            </button>
         </div>
        <!-- <a href="{{url('lecturerAdd')}}?right_id=2">讲师添加</a> -->
        <button class="layui-btn" onclick="member_add('讲师添加','member-add.html','600','500')">
            <i class="layui-icon">&#xe608;</i>
            <a href="{{url('lecturerAdd')}}?right_id=2">讲师添加</a>
        </button></xblock>
    </form>
    <form action="" method="post">
        <table class="layui-table">
            <thead>
            <tr>
                <td>ID</td>
                <td>讲师名称</td>
                <td>讲师个人简历</td>
                <td>讲师授课风格</td>
                <td>操作</td>
            </tr>
            @foreach($data as $v)
                <tr>
                    <td>{{$v->lect_id}}</td>
                    <td>{{$v->lect_name}}</td>
                    <td>{{$v->lect_resume}}</td>
                    <td>{{$v->lect_style}}</td>
                    <td>
                        <a href="{{url('del',['lect_id'=>$v->lect_id])}}?right_id=1"  class='btn btn-danger del' >删除</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </form>
    
    {{ $data->appends($req)->links()}}
 <!-- 右侧内容框架，更改从这里结束 -->
 </div>
        </div>
        <!-- 右侧主体结束 -->
    @endsection
    
