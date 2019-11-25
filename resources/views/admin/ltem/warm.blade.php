@extends('layouts.app')
@section('title', '')
@section('content')

    <div class="wrapper">
        <!--左侧导航开始-->
        @include('public.left')
        <div class="page-content">
            <div class="content">

    <form  action="/ltem/warm_add" method="post" class="layui-form layui-form-pane">
        <input type="hidden" name="type_id" value="3">
        <span>判断</span>
        <br/>
        题目：<input type="text" name="judge" value="" class="layui-input"><br/>
        对:<input type="radio" name="judge_answer" value="1">

        错:<input type="radio" name="judge_answer" value="2">
        <input type="submit" name="sub" value="提交" class="layui-btn">
    </form>
            </div>
        </div>
@endsection











