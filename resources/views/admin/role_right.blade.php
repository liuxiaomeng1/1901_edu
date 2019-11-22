@extends('layouts.app')
@section('title','在线教育系统')



@section('content')
    @include('public/left')
     <!-- 右侧主体开始 -->
     <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
        
    <form action="{{url('role_right')}}" method="post">
        <input type="hidden" name="role_id" value="{{$role_id}}">
             <table class="layui-table">
                 <thead>
            @foreach($role_right as $v)
                <tr>
                   
                    <td>{{$v['right_name']}}</td>
                    <td></td>
                </tr>

               
                <tr>
                    <td></td>
                    @foreach($v['name'] as $vi)
                        <td>
                            <input type="checkbox" name="r_id[]" id="" class="aaa" value="{{$vi['right_id']}}">{{$vi['description']}}
                        </td>
                    @endforeach
                </tr>
            @endforeach
            <!-- <tr>
                <td><input type="submit" value="添加"></td>
            </tr>
        </table> -->
        <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button  class="layui-btn" lay-filter="add" lay-submit="">
                        添加
                    </button>
                </div>
    </form>
         </div>
             </div>
        <!-- 右侧主体结束 -->
    @endsection