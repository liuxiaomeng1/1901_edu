@extends('layouts.app')
@section('title','在线教育系统')
@section('content')
    @include('public/left')
    <div class="page-content">
        <div class="content">
    <form method="post" action="/lect/directory_do" enctype="multipart/form-data" class="layui-form layui-form-pane">



        <div class="layui-form-item">
            <label class="layui-form-label">课程</label>
            <div class="layui-input-block">
                <select name="class_id" lay-filter="aihao">
                    @foreach($class as $v)
                        <option value="{{$v['class_id']}}" @if($v['class_id']== $id)selected @endif>{{$v['class_name']}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="layui-form-item">
            <label for="level-name" class="layui-form-label">
                <span class="x-red">*</span>章节名称
            </label>
            <div class="layui-input-inline">
                <input type="text" id="level-name" name="catalog_name" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="level-name" class="layui-form-label">
                <span class="x-red">*</span>标题
            </label>
            <div class="layui-input-inline">
                <input type="text" id="level-name" name="catalog_head" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label for="L_sign" class="layui-form-label">
                <span class="x-red">*</span>描述
            </label>
            <div class="layui-input-block">
                <textarea id="L_sign" name="catalog_describe" autocomplete="off" class="layui-textarea" style="height: 150px;width: 400px;"></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="level-name" class="layui-form-label">
                <span class="x-red">*</span>相关视频
            </label>
            <div class="layui-input-inline">
                <input type="file" id="level-name" name="video_url" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">

            <button  class="layui-btn btn" lay-filter="save" lay-submit="">
                章节添加
            </button>
        </div>
    </form>
        </div>
    </div>

@endsection
