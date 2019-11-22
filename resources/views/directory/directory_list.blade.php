@extends('layouts.app')
@section('title','在线教育系统')
@section('content')
    @include('public/left')


    <div class="page-content">
        <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->


            <a href="{{url('lect/directory_add')}}?class_id={{$id}}">添加章节</a>
            <table class="layui-table">
                <thead>
                <tr>
                    <th >章节id</th>
                    <th >课程名称</th>
                    <th >相关视频</th>
                    <th >章节名称</th>
                    <th >标题</th>
                    <th >描述</th>
                    <th >是否免费</th>
                    <th >审核状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $v)
                    <tr class="active">
                        <td >{{$v['catalog_id']}}</td>
                        <td >{{$v['class_name']}}</td>
                        <td ><video width="200" height="80" src="/{{$v['video_url']}}" controls="controls"></video></td>
                        <td >{{$v['catalog_name']}}</td>
                        <td >{{$v['catalog_head']}}</td>
                        <td >{{$v['catalog_describe']}}</td>
                        <td >
                            @if($v['is_free'] == 0)
                                否
                            @elseif($v['is_free'] == 1)
                                是
                            @endif
                        </td>
                        <td >
                            @if($v['is_audit'] == 0)
                                <button  class="layui-btn btn" lay-filter="save" lay-submit="">
                                    <a href="{{url('lect/audit')}}?catalog_id={{$v['catalog_id']}}&is_audit={{$v['is_audit']}}">未审核</a>
                                </button>
                            @elseif($v['is_audit'] == 1)
                                <button  class="layui-btn btn" lay-filter="save" lay-submit="">
                                    <a href="{{url('lect/audit')}}?catalog_id={{$v['catalog_id']}}&is_audit={{$v['is_audit']}}">已通过</a>
                                </button>
                            @endif
                        </td>
                        <td>
                            <a  class="btn btn-primary sub"  href="{{url('lect/directory_del')}}?catalog_id={{$v['catalog_id']}}" >删除</a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
{{--                <tr><td colspan="8" rowspan="" headers="">{{$data->links()}}</td></tr>--}}
            </table>

            <!-- 右侧内容框架，更改从这里结束 -->
        </div>
    </div>
@endsection