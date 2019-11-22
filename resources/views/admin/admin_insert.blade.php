@extends('layouts.app')
@section('title','在线教育系统')



@section('content')
    @include('public/left')
     <!-- 右侧主体开始 -->
     <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
    <form action="{{url('admin_submit')}}" method="post">
        <input type="hidden" name="right_id" value="{{$right_id}}">
        <table class="table">
           
            <div class="layui-form-item">
                            <label for="L_username" class="layui-form-label">
                                <span class="x-red">*</span>昵称
                            </label>
                                <div class="layui-input-inline">
                                    <input type="text"  name="admin_name" required="" lay-verify="nikename"
                                    autocomplete="off" class="layui-input">
                                </div>
                        </div>
                        

          <div class="layui-form-item">
                    <label for="L_pass" class="layui-form-label">
                        <span class="x-red">*</span>密码
                    </label>
                            <div class="layui-input-inline">
                                <input type="password"  name="password" required="" lay-verify="pass"
                                autocomplete="off" class="layui-input">
                            </div>
                </div>
                                

             <div class="layui-form-item">
                     <label for="L_username" class="layui-form-label">
                         <span class="x-red">*</span>电话号码
                     </label>
                                <div class="layui-input-inline">
                                   <input type="tel"  name="mobile" required="" lay-verify="nikename"
                                autocomplete="off" class="layui-input">
                            </div>
                        </div>
                       

             <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>邮箱
                    </label>
                        <div class="layui-input-inline">
                            <input type="email" name="email" required="" lay-verify="email"
                            autocomplete="off" class="layui-input">
                        </div>
                    </div>
            
                    
                <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label">
                        </label>
                        <button  class="layui-btn" lay-filter="add" lay-submit="">
                            添加
                        </button>
                    </div>

    </form>
     <!-- 右侧内容框架，更改从这里结束 -->
     </div>
        </div>
        <!-- 右侧主体结束 -->
    @endsection
    
