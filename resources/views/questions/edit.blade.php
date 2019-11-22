@extends('layouts.app')
@section('title','在线教育系统')
@section('content')
    @include('public/left')


    <form method="post" action="{{url('questions/update')}}">
        <div class="form-group">
            <input type="hidden" name="q_id" value="{{$data->q_id}}">
        </div>
        <div class="layui-form-item">
            <label for="level-name" class="layui-form-label">
                <span class="x-red">*</span>问题标题
            </label>
            <div class="layui-input-inline">
                <input type="text" id="level-name" name="q_title" value="{{$data->q_title}}" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
            </label>
            <button  class="layui-btn btn" lay-filter="save" lay-submit="">
                问题添加
            </button>
        </div>
    </form>
<script src="{{asset('/js/jquery.min.js?v=2.1.4')}}"></script>
@endsection


