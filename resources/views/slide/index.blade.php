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
                        轮播图
                    </th>
                    <th>
                        图片权重
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
                            {{$v->slide_id}}
                        </td>
                        <td>
                            <img src="/public_path/{{$v->slide_url}}" alt="" width="50px">
                        </td>
                        <td>
                            {{$v->slide_weight}}
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