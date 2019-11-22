@extends('layouts.app')
@section('title','在线教育系统')

@section('content')
    @include('public/left')
    <form class="layui-form" action="{{url('slide/add_do')}}" method="post" enctype="multipart/form-data">
        <div class="layui-form-item">
            <label for="level-name" class="layui-form-label">
                <span class="x-red">*</span>轮播权重
            </label>
            <div class="layui-input-inline">
                <input type="text" id="level-name" name="slide_weight" required="" lay-verify="required"
                       autocomplete="off"  class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="level-kiss" class="layui-form-label">
                <span class="x-red">*</span>轮播图
            </label>
            <div class="layui-input-inline">
                <input type="file" name="slide_url">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
            </label>
            <button  class="layui-btn" lay-filter="save" lay-submit="">
                保存
            </button>
        </div>
    </form>
@endsection