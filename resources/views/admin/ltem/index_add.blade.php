@extends('layouts.app')
@section('title', '选择题型')
@section('content')

    <div class="wrapper">
        <!--左侧导航开始-->
        @include('public.left')
        <div class="page-content">
            <div class="content">

    <form  action="/ltem/bank_add" method="post">

            <div>
                <button type="button" class="layui-btn redio">单选题</button><br/>
                <br/>
                <button type="button" class="layui-btn layui-btn-warm">判断题</button><br/>
                <br/>
                <button type="button" class="layui-btn layui-btn-danger">多选题</button>
            </div>

    </form>
<script type="text/javascript">
    $(document).on('click','.redio',function(){
        location.href="lt_radio";
    })
    $(document).on('click','.layui-btn-warm',function(){
        location.href="lt_warm";

    })
    $(document).on('click','.layui-btn-danger',function(){
        location.href="lt_danger";

    })
</script>
            </div>
        </div>
@endsection











