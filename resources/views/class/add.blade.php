@extends('layouts.app')
@section('title', '讲师添加')
@section('content')

        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>添加</title>
</head>
<body>
<h1>讲师添加</h1>
<br/>
<div class="layui-form layui-form-pane" >
    <div class="layui-form-item">
        <label class="layui-form-label">讲师姓名</label>
        <div class="layui-input-inline">
            <input type="text" name="lect_name" autocomplete="off" placeholder="请输入姓名" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">讲师图片</label>
        <div class="layui-input-inline">
            <input type="file" name="image" id="file">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">授课风格</label>
        <div class="layui-input-inline">
            <input type="text" name="lect_style" lay-verify="required" placeholder="讲师授课风格" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">个人简历</label>
        <div class="layui-input-inline" style="width: 500px;">
            <textarea  name="lect_resume" id="goods_intro"></textarea>
        </div>
    </div>

    <div class="layui-form-item">
        <button type="submit" class="abb layui-btn layui-btn-normal">添加</button>
    </div>
</div>
</html>
<script type="text/javascript" src="{{asset('/ueditor/ueditor.config.js')}}"></script>
<script type="text/javascript" src="{{asset('/ueditor/ueditor.all.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
<script type="text/javascript">
    var ue = UE.getEditor('goods_intro');
</script>
<script type="text/javascript">

    $(document).on('click','.abb',function(){
        //alert(111);
        var lect_name = $("[name='lect_name']").val();
        var lect_resume = $("[name='lect_resume']").val();
        var lect_style = $("[name='lect_style']").val();

        var formData = new FormData();
        var file = $('#file')[0].files[0];
        //console.log(file);return;
        formData.append('file',file);
        formData.append('lect_name',lect_name);
        formData.append('lect_resume',lect_resume);
        formData.append('lect_style',lect_style);
        //调用后台接口
        $.ajax({
            url:"{{url('class/index')}}",
            data:formData,
            type:"POST",
            dataType:"json",
            processData : false, // 使数据不做处理
            contentType : false, // 不要设置Content-Type请求头
            success:function(res){
                alert(res.msg);
                if (res.code==2){

                    location.href="{{url('class/create')}}";
                }else{
                   location.href="{{url('class/list')}}";

                }

            }

        })
    });
</script>


@endsection



