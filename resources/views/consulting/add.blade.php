@extends('layouts.app')
@section('title','在线教育系统')
@include('UEditor::head');
@section('content')
    @include('public/left')

    <form class="layui-form" action="{{url('consulting/add_do')}}" method="post" enctype="multipart/form-data">
        <div class="layui-form-item">
            <label for="level-name" class="layui-form-label">
                <span class="x-red">*</span>标题
            </label>
            <div class="layui-input-inline">
                <input type="text" id="level-name" name="infor_title" required="" lay-verify="required"
                       autocomplete="off"  class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="level-kiss" class="layui-form-label">
                <span class="x-red">*</span>正文
            </label>
            <div class="layui-input-inline">

                <!-- 加载编辑器的容器 -->
                <script id="container" name="infor_content"  type="text/plain" style="width:1000px">
                    这里写你的初始化内容
                </script>

                <!-- 实例化编辑器 -->
                <script type="text/javascript" >
                var ue = UE.getEditor('container');
                ue.ready(function() {
                    ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
                });
                ue.ready(function() {
                    ue.setHeight(200);
                    //设置编辑器的内容
                    // ue.setContent('hello');
                    // //获取html内容，返回: <p>hello</p>
                    // var html = ue.getContent();
                    // //获取纯文本内容，返回: hello
                    // var txt = ue.getContentTxt();
                });
                </script>



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

