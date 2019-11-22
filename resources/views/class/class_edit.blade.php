@extends('layouts.app')
@section('title','课程修改')
@section('content')

    <div class="wrapper">
        <!--左侧导航开始-->
        @include('public.left')
        <div class="page-content">
            <div class="content">

                <form class="layui-form layui-form-pane" method="post" action="/class/class_edit_do" enctype="multipart/form-data">
                    @foreach($edit_data as $vv)
                        <input type="hidden" name="class_id" value="{{$vv['class_id']}}">
                    <div class="layui-form-item">
                        <label class="layui-form-label">讲师</label>
                        <div class="layui-input-block">
                            <select name="teacher_id" lay-filter="aihao">

                                @foreach($teacher as $k=>$v)
                                    <option value="{{$v['teacher_id']}}"@if($v['teacher_id']== $vv['teacher_id'])selected @endif>{{$v['teacher_name']}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">课程分类</label>
                        <div class="layui-input-block">
                            <select name="cate_id" lay-filter="aihao">
                                @foreach($category as $k=>$v)
                                    <option value="{{$v['cate_id']}}" @if($v['cate_id']== $vv['cate_id'])selected @endif >{{$v['cate_name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">ljf
                        <label class="layui-form-label">课程名称</label>
                        <div class="layui-input-inline">
                            <input type="text" name="class_name" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input" value="{{$vv['class_name']}}">
                        </div>
                    </div>
                    <div class="layui-form-item" pane="">
                        <label class="layui-form-label">是否授课</label>
                        <div class="layui-input-block">
                            <input type="radio" name="class_status" value="1" title="是" @if($vv['class_status']==1)checked @endif>
                            <input type="radio" name="class_status" value="0" title="否"  @if($vv['class_status']==0)checked @endif>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">总课时</label>
                            <div class="layui-input-inline" style="width: 100px;">
                                <input type="text" name="class_num"  autocomplete="off" value="{{$vv['class_num']}}" class="layui-input">
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item" pane="">
                        <label class="layui-form-label">是否免费</label>
                        <div class="layui-input-block" id="aaa">
                            <input type="radio" name="is_free"  class="free" value="1" title="是"  @if($vv['is_free']==1)checked @endif>
                            <input type="radio" name="is_free"  class="free" value="0" title="否" @if($vv['is_free']==0)checked @endif>
                        </div>
                    </div>
                    <div class="layui-form-item" id="div1">
                        <div class="layui-inline">
                            <label class="layui-form-label">课程价格</label>
                            <div class="layui-input-inline" style="width: 100px;">
                                <input type="text" name="class_price" value="{{$vv['class_price']}}"  autocomplete="off" class="layui-input">
                            </div>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">上传课件</label>
                        <div class="layui-input-inline">
                            <input type="file" name="class_img"   class="layui-input">
                        </div>
                        <div>
                            <img src="/{{$vv['class_img']}}" alt="" width="80px">
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">课程介绍</label>
                        <div class="layui-input-block">
                            <textarea placeholder="请输入内容" class="layui-textarea">{{$vv['class_desc']}}</textarea>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <button class="layui-btn" lay-submit=""  lay-filter="demo2">提交</button>
                    </div>
                    @endforeach
                </form>

            </div>
        </div>
        <script>
            $(function () {
                $("#div1").hide();
                $("#aaa").click(function () {
                    var a = $("input[name='is_free']:checked").val();
                    if (a == 1 ){
                        $("#div1").hide();
                    }else{
                        $("#div1").show();
                    }
                })


            })
        </script>
@endsection