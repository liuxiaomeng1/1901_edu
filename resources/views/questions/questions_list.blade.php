@extends('layouts.app')
@section('title','在线教育系统')
@section('content')
    @include('public/left')

    <div class="page-content">
        <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <button class="layui-btn">
                <a href="/questions/questions"><i class="layui-icon">&#xe608;</i>添加</a>
            </button>
            <table class="layui-table">
                <thead>
                <tr>
                    <th>
                        <input type="checkbox" name="" value="">
                    </th>
                    <th >问题编号</th>
                    <th >问题标题</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($res as $v)
                    <tr class="active">
                        <td>
                            <input type="checkbox" name="" value="">
                        </td>
                        <td >{{$v->q_id}}</td>
                        <td >{{$v->q_title}}</td>
                        <td>
                            <a  class="btn btn-primary sub"  href="{{url('questions/del')}}?q_id={{$v->q_id}}" >删除</a>
                            <a  class=" btn btn-warning"  href="{{url('questions/edit')}}?q_id={{$v->q_id}}">修改</a>
                            <a  class="btn btn-warning" href="{{url('questions/response')}}?q_id={{$v->q_id}}">回答</a>
                            <a  class="btn btn-warning" href="{{url('questions/response_list')}}?q_id={{$v->q_id}}">回答列表</a>

                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            <!-- 右侧内容框架，更改从这里结束 -->
        </div>
    </div>
@endsection