@extends('layouts.app')
@section('title','在线教育系统')



@section('content')
    @include('public/left')

      <!-- 右侧主体开始 -->
      <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->

    <!-- <h4><a href="{{url('role_select')}}?right_id=17">添加</a></h4> -->
    <button class="layui-btn" onclick="member_add('添加角色','member-add.html','600','500')">
        <i class="layui-icon">&#xe608;</i>
            <a href="{{url('role_select')}}?right_id=17">添加角色</a>
    </button></xblock>
    
    <table class="layui-table">
        <thead>
            <tr>
                     <th>  <input type="checkbox" name="" value=""> </th>
                            <th>序号</th>
                            <th>名称</th>
                            <th>介绍</th>
                            <th>操作</th>
        </tr>
                      @foreach($role as $v)
        <tr >
                    <th> <input type="checkbox" name="" value=""> </th>
                            <th>{{$v->role_id}}</th>
                            <th>{{$v->role_name}}</th>
                            <th>{{$v->description}}</th>
                     
                <th>
                        <a href="{{url('role_delete',['role_id'=>$v->role_id])}}?right_id=14">删除</a>
<!-- {{--                <a href="{{url('role_delete',['role_id'=>$v->role_id])}}?right_id=15">角色修改</a>--}} -->
<!-- {{--                <a href="{{url('role_delete',['role_id'=>$v->role_id])}}?right_id=13">权限设置</a>--}} -->

                 </th>
        </tr>
              @endforeach
    </table>

     <!-- 右侧内容框架，更改从这里结束 -->
     </div>
        </div>
        <!-- 右侧主体结束 -->
    @endsection
