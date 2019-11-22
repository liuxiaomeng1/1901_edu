@extends('layouts.app')
@section('title','在线教育系统')
@section('content')
    @include('public/left')

    <form method="post" action="/questions/response_do?q_id={{$data['q_id']}}">
        <div class="layui-form-item">
            <label for="level-name" class="layui-form-label">
                <span class="x-red">*</span>问题标题
            </label>
            <div class="layui-input-inline">
                <input type="text" value="{{$data['q_title']}}" name="q_title" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label for="L_sign" class="layui-form-label">
                回答内容
            </label>
            <div class="layui-input-block">
                <textarea name="r_content" class="layui-textarea" style="height: 150px;width: 400px;"></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
            </label>
            <button  class="layui-btn btn" lay-filter="save" lay-submit="">
                提交回答
            </button>
        </div>
    </form>

@endsection
