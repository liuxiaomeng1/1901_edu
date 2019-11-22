@extends('layouts.app')
@section('title','在线教育系统')



@section('content')
    @include('public/left')

             <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
    <form action="{{url('admin_role_insert')}}" method="post">
        <input type="hidden" name="right_id" value="{{$right_id}}">
        <input type="hidden" name="admin_id" value="{{$admin_id}}">
    <table class=" layui-table">
                <thead>
                     <tr>
                            <th> <input type="checkbox" name="" value=""> </th>
            <th>序号</th>
            <th>名称</th>
            <th>介绍</th>
            <th>权限角色选中</th>
        </tr>
        @foreach($role as $v)
            <tr >
                <th> <input type="checkbox" name="" value=""> </th>
                <th>{{$v->role_id}}</th>
                <th>{{$v->role_name}}</th>
                <th>{{$v->description}}</th>
                <th>
                    <input type="checkbox" name="quanxian[]" value="{{$v->role_id}}" id="">
                </th>
            </tr>
        @endforeach

       <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button  class="layui-btn" lay-filter="add" lay-submit="">
                        增加
                    </button>
                </div>
            
    
    </form>
     <!-- 右侧内容框架，更改从这里结束 -->
     </div>
        </div>
        <!-- 右侧主体结束 -->
    @endsection
