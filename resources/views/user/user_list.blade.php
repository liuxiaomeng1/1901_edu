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
                    <th >管理员id</th>
                    <th >管理员名称</th>
                    <th >手机号</th>
                    <th >邮箱</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $v)
                    <tr class="active">
                        <td >{{$v['admin_id']}}</td>
                        <td >{{$v['admin_name']}}</td>
                        <td >{{$v['mobile']}}</td>
                        <td >{{$v['email']}}</td>
                        <td>
                            @if($v['admin_status'] == 0)
                            <a  class=" btn btn-warning"  href="{{url('user/card')}}?admin_id={{$v['admin_id']}}">设为非会员</a>
                            @elseif($v['admin_status'] == 1)
                                <a  class=" btn btn-warning"  href="{{url('user/card')}}?admin_id={{$v['admin_id']}}">设为会员</a>
                            @endif
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            <!-- 右侧内容框架，更改从这里结束 -->
        </div>
    </div>
@endsection