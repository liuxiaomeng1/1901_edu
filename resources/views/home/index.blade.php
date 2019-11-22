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
            <span class="x-right" style="line-height:40px">共有数据：条</span></xblock>
            <table class="layui-table">
                <thead>
                <tr>
                    <th>
                        <input type="checkbox" name="" value="">
                    </th>
                    <th>
                        课程id
                    </th>
                    <th>
                        章节id
                    </th>
                    <th>
                        作业内容
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
                            {{$v->class_name}}
                        </td>
                        <td>
                            {{$v->catalog_name}}
                        </td>
                        <td >
                            {{$v->job_name}}
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