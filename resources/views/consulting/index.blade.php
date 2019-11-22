@extends('layouts.app')
@section('title','在线教育系统')

@section('content')
    @include('public/left')
    <div class="page-content">
        <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form xbs" action="" >
                <div class="layui-form-pane" style="text-align: center;">
                    <div class="layui-form-item" style="display: inline-block;">

                    </div>
                </div>
            </form>
            <span class="x-right" style="line-height:40px">共有数据：{{$count}}条</span></xblock>
            <table class="layui-table">
                <thead>
                <tr>
                    <th>
                        <input type="checkbox" name="" value="">
                    </th>
                    <th>
                        id
                    </th>
                    <th>
                        咨询标题
                    </th>
                    <th>
                        资讯内容
                    </th>
                    <th>
                        添加时间
                    </th>
                    <th>
                        操作
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $v)
                    <tr>
                        <td>
                            <input type="checkbox" value="1" name="">
                        </td>
                        <td>
                            {{$v->infor_id}}
                        </td>
                        <td>
                            {{$v->infor_title}}
                        </td>
                        <td>
                            {{str_limit($v->infor_content,20,'....')}}
                        </td>
                        <td>
                            {{date('Y-m-d H:i:s',$v->infor_time)}}
                        </td>
                        <td class="td-manage">
                            <a style="text-decoration:none" href="{{url('consulting/edit')}}?infor_id={{$v->infor_id}}" title="编辑">
                                <i class="layui-icon">&#xe618;</i>
                            </a>
                            <a title="删除" href="{{url('consulting/del')}}?infor_id={{$v->infor_id}}" style="text-decoration:none">
                                <i class="layui-icon">&#xe640;</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!-- 右侧内容框架，更改从这里结束 -->
        </div>
    </div>
    <!-- 右侧主体结束 -->
@endsection