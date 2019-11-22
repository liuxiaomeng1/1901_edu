@extends('layouts.app')
@section('title','在线教育系统')



@section('content')
    @include('public/left')
      <!-- 右侧主体开始 -->
      <div class="page-content">
          <div class="content">
        
    <!-- <a href="{{url('/admin_insert')}}?right_id=12">添加管理员</a> -->
    <button class="layui-btn" onclick="member_add('添加管理员','member-add.html','600','500')">
        <i class="layui-icon">&#xe608;</i>
            <a href="{{url('/admin_insert')}}?right_id=12">添加管理员</a>
    </button></xblock>
    <table class="layui-table">
        <thead>
            <tr>
                <th> <input type="checkbox" name="" value=""> </th>
            <th>ID</th>
            <th>管理员</th>
            <th>手机号</th>
            <th>时间</th>
            <th> &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp 操 &nbsp  &nbsp  &nbsp  &nbsp    &nbsp  作</th>
        </tr>
        @foreach($admin as $v)
        <tr>
              <th> <input type="checkbox" name="" value=""> </th>
            <th>{{$v->admin_id}}</th>
            <th>{{$v->admin_name}}</th>
            <th>{{$v->mobile}}</th>
            <th>{{date('Y-m-d H:i:s',$v->create_time)}}</th>
            <th>
                <a href="{{url('admin_delete',['admin_id'=>$v->admin_id])}}?right_id=11">删除</a>
                <a href="{{url('admin_update')}}?admin_id={{$v->admin_id}}">修改密码</a>
                <a href="{{url('admin_set',['admin_id'=>$v->admin_id])}}?right_id=16">设置角色</a>

            </th>
        </tr>
        @endforeach
    </table>

    
    
   <!-- 右侧内容框架，更改从这里结束 -->
         </div>
        </div>
        <!-- 右侧主体结束 -->
    @endsection
    

    