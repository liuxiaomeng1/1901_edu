@extends('layouts.app')
@section('title','在线教育系统')



@section('content')
    @include('public/left')
     <!-- 右侧主体开始 -->
     <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
    <form action="{{url('/home_do')}}" method="post">
       
        <table class="table">
           
            <div class="layui-form-item">
                            <label for="L_username" class="layui-form-label">
                                <span class="x-red">*</span>导航名
                            </label>
                                <div class="layui-input-inline">
                                    <input type="text"  name="nav_name" required="" lay-verify="nikename"
                                    autocomplete="off" class="layui-input">
                                </div>
                        </div>
                        

          
                                

             <div class="layui-form-item">
                     <label for="L_username" class="layui-form-label">
                         <span class="x-red">*</span>导航路径
                     </label>
                                <div class="layui-input-inline">
                                   <input type="text"  name="nav_url" required="" lay-verify="nikename"
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
    
