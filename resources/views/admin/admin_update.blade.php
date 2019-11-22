@extends('layouts.app')
@section('title','在线教育系统')



@section('content')
    @include('public/left')
        <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
    <form action="{{url('admin_update_add')}}" method="post">
        <input type="hidden" name="admin_id" value="{{$admin_id}}">
       
                    
            <div class="layui-form-item">
                    <label for="L_pass" class="layui-form-label">
                        <span class="x-red">*</span>修改密码：
                    </label>
                        <div class="layui-input-inline">
                            <input type="password"  name="password" required="" lay-verify="pass"
                            autocomplete="off" class="layui-input">
                        </div>
                    
                </div>


            <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button  class="layui-btn" lay-filter="add" lay-submit="">
                        提交
                    </button>
                </div>
        
    </form>
      <!-- 右侧内容框架，更改从这里结束 -->
      </div>
        </div>
        <!-- 右侧主体结束 -->
    @endsection
