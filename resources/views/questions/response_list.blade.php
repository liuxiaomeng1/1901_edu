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
                    <th>回答编号</th>
                    <th>回答内容</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $v)
                    <tr class="active">
                        <td >{{$v['r_id']}}</td>
                        <td >{{$v['r_content']}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!-- 右侧内容框架，更改从这里结束 -->
        </div>
    </div>
@endsection