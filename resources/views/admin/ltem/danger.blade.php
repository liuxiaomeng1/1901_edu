@extends('layouts.app')
@section('title', '')
@section('content')

    <div class="wrapper">
        <!--左侧导航开始-->
        @include('public.left')
        <div class="page-content">
            <div class="content">

    <form  action="/ltem/danger_add" method="post" class="layui-form layui-form-pane">
        <input type="hidden" name="type_id" value="2">
        <span>多选</span><br/>
        题目：<input type="text" name="problem" value="" class="layui-input"><br/>
        A:<input type="checkbox" name="single_answer[]" value="1">
        <input type="text" name="single_a" class="layui-input"><br/>
        B:<input type="checkbox" name="single_answer[]" value="2">
        <input type="text" name="single_b" class="layui-input"><br/>
        C:<input type="checkbox" name="single_answer[]" value="3">
        <input type="text" name="single_c" class="layui-input"><br/>
        D:<input type="checkbox" name="single_answer[]" value="4">
        <input type="text" name="single_d" class="layui-input"><br/>
        <input type="submit" name="sub" value="提交" class="layui-btn">
    </form>
            </div>
        </div>
@endsection











