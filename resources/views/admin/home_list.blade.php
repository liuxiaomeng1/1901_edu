@extends('layouts.app')
@section('title','在线教育系统')



@section('content')
    @include('public/left')
      <!-- 右侧主体开始 -->
      <div class="page-content">
          <div class="content">
        
    <!-- <a href="{{url('/admin_insert')}}?right_id=12">添加管理员</a> -->
    <!-- <button class="layui-btn" onclick="member_add('添加管理员','member-add.html','600','500')">
        <i class="layui-icon">&#xe608;</i>
            <a href="{{url('/admin_insert')}}?right_id=12">添加管理员</a>
    </button></xblock> -->
    
    <link rel="stylesheet" type="text/css" href="{{asset('css/page.css')}}">
    <table class="layui-table">
        <thead>
            <tr>
                <th> <input type="checkbox" name="" value=""> </th>
                <th>导航名</th>
                <th>导航跳转地址</th>
               
                <th> 操作</th>
            </tr>
            @if($data)
        @foreach($data as $v)
        <tr>
              <th> <input type="checkbox" name="" value=""> </th>
                    <th>{{$v->nav_name}}</th>
                    <th>{{$v->nav_url}}</th>
            <th> 
                
                <a href="{{url('/home_del')}}?nav_id={{$v->nav_id}}">删除 </a>

             </th>
        </tr>
        @endforeach
        @endif
    </table>

    <center>{{$data->links()}}</center>   
        

    
    
   <!-- 右侧内容框架，更改从这里结束 -->
         </div>
        </div>
        <!-- 右侧主体结束 -->
    @endsection
    

    