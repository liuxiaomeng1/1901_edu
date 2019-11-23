@extends('layouts.app')
@section('title','在线教育系统')
@section('content')
    @include('public/left')

    <div class="page-content">
        <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <table class="layui-table">
                <thead>
                <tr>
                    <th>用户名</th>
                    <th>回答内容</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $v)
                    <tr class="active">
                        <td >{{$v['u_name']}}</td>
                        <td >{{$v['r_content']}}</td>
                        <td>
                            <a  class="btn btn-primary sub"  href="{{url('questions/response_del')}}?r_id={{$v['r_id']}}" >删除</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!-- 右侧内容框架，更改从这里结束 -->
        </div>
    </div>
@endsection