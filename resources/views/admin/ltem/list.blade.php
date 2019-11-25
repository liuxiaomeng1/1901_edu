@extends('layouts.app')
@section('title', '题目列表')
@section('content')

    <div class="wrapper">
        <!--左侧导航开始-->
        @include('public.left')
        <div class="page-content">
            <div class="content">
    <form>
        <div>
            <h1 align="center">题目列表</h1>

            <table class="layui-table" align="center">
                <!-- <colgroup align="center">
                  <col width="150" >
                  <col width="200" >
                  <col>
                </colgroup> -->
                <thead >
                <tr align="center">
                    <th>题目名称</th>
                    <th>试题分类</th>
                    <th>操作</th>
                </tr>
                </thead>
                    @foreach ($data as $k=>$v)
                    <tbody id="list" align="center">

                        <td>{{$v['problem']}}</td>
                    <td>
                        @if ($v['type_id'] == 1)
                            单1选
                        @elseif ($v['type_id'] == 2)
                            多1选
                        @elseif ($v['type_id']== 3)
                            判1断
                        @endif

                    </td>
                    <td><a href="/ltem/lt_del?id={{$v['id']}}" class='btn layui-btn layui-btn-sm'>删除1</a>
                        <a href="/ltem/lt_upd?id={{$v['id']}}" class='btn layui-btn layui-btn-sm'>修改</a></td></td>
                    </tbody>

                @endforeach
            </table>
        </div>
    </form>
    <script>
        layui.use(['form', 'layedit', 'laydate'], function(){
        });
    </script>

    </div>
    </div>
@endsection

