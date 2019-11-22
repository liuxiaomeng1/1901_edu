@extends('layouts.app')
@section('title','在线教育系统')



@section('content')
    @include('public/left')
    <!-- 右侧主体开始 -->
    <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->

<form action="{{url('/lecturerAddhandel')}}" method="post">
    
        <!-- <label for="exampleInputEmail1">讲师名称：</label>
        <input type="text" class="form-control" name="lect_name" placeholder="名称"> -->
        <div class="layui-form-item">
                            <label for="L_username" class="layui-form-label">
                                <span class="x-red">*</span>讲师姓名：
                            </label>
                            <div class="layui-input-inline">
                                <input type="text"  name="lect_name" required="" lay-verify="nikename"
                                autocomplete="off" class="layui-input" placeholder="请输入讲师姓名">
                            </div>
                        </div>
    
   
        <!-- <label for="exampleInputEmail1">讲师个人简历：</label>
        <input type="text" class="form-control" name="lect_resume" placeholder="个人简历"> -->
        <div class="layui-form-item">
                            <label for="L_username" class="layui-form-label">
                                <span class="x-red">*</span>个人简历：
                            </label>
                            <div class="layui-input-inline">
                                <input type="text" id="L_username" name="lect_resume" required="" lay-verify="nikename"
                                autocomplete="off" class="layui-input" placeholder="请输入讲师个人简历">
                            </div>
                        </div>
    
    
        <!-- <label for="exampleInputEmail1">讲师授课风格：</label>
        <input type="text" class="form-control" name="lect_style" placeholder="授课风格"> -->
        <div class="layui-form-item">
                            <label for="L_username" class="layui-form-label">
                                <span class="x-red">*</span>授课风格：
                            </label>
                            <div class="layui-input-inline">
                                <input type="text" id="L_username" name="lect_style" required="" lay-verify="nikename"
                                autocomplete="off" class="layui-input" placeholder="请输入讲师授课风格">
                            </div>
                        </div>
    
    <button type="submit" class="btn btn-default">提交</button>
</form>


 <!-- 右侧内容框架，更改从这里结束 -->
 </div>
        </div>
        <!-- 右侧主体结束 -->
@endsection
