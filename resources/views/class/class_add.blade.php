@extends('layouts.app')
@section('title','课程添加')
@section('content')
    @include('UEditor::head');
    <div class="wrapper">
        <!--左侧导航开始-->
        @include('public.left')
        <div class="page-content">
            <div class="content">

                <form class="layui-form layui-form-pane" method="post" action="/class/class_add_do" enctype="multipart/form-data">
                    <div class="layui-form-item">
                        <label class="layui-form-label">讲师</label>
                        <div class="layui-input-block">
                            <select name="teacher_id" lay-filter="aihao">
                                @foreach($teacher as $k=>$v)
                                    <option value="{{$v->teacher_id}}">{{$v->teacher_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">课程分类</label>
                        <div class="layui-input-block">
                            <select name="cate_id" lay-filter="aihao">
                                @foreach($category as $k=>$v)
                                    <option value="{{$v['cate_id']}}">{{$v['cate_name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">课程名称</label>
                        <div class="layui-input-inline">
                            <input type="text" name="class_name" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item" pane="">
                        <label class="layui-form-label">是否授课</label>
                        <div class="layui-input-block">
                            <input type="radio" name="class_status" value="1" title="是" checked="">
                            <input type="radio" name="class_status" value="0" title="否">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">总课时</label>
                            <div class="layui-input-inline" style="width: 100px;">
                                <input type="text" name="class_num"  autocomplete="off" class="layui-input">
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item" pane="">
                        <label class="layui-form-label">是否免费</label>
                        <div class="layui-input-block" id="aaa">
                            <input type="radio" name="is_free"  class="free" value="1" title="是" checked>
                            <input type="radio" name="is_free"  class="free" value="0" title="否">
                        </div>
                    </div>
                    <div class="layui-form-item" id="div1">
                        <div class="layui-inline">
                            <label class="layui-form-label">课程价格</label>
                            <div class="layui-input-inline" style="width: 100px;">
                                <input type="text" name="class_price"  autocomplete="off" class="layui-input">
                            </div>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">上传课件</label>
                        <div class="layui-input-inline">
                            <input type="file" name="class_img"   class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">课程介绍</label>
                        <div class="layui-input-block">
                            <!-- 加载编辑器的容器 -->
                            <script id="container" name="class_desc"  type="text/plain" style="width:1000px">
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
                        <button class="layui-btn" lay-submit=""  lay-filter="demo2">提交</button>
                    </div>
                </form>

            </div>
        </div>
        <script>
            $(function ()
            {

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