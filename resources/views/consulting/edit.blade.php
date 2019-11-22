@extends('layouts.app')
@section('title','在线教育系统')

@section('content')
    @include('public/left')

    <form class="layui-form" action="{{url('consulting/update')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="infor_id" value="{{$data->infor_id}}">
        <div class="layui-form-item">
            <label for="level-name" class="layui-form-label">
                <span class="x-red">*</span>标题
            </label>
            <div class="layui-input-inline">
                <input type="text" id="level-name" name="infor_title" required="" lay-verify="required"
                       autocomplete="off"  class="layui-input" value="{{$data->infor_title}}">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="level-kiss" class="layui-form-label">
                <span class="x-red">*</span>正文
            </label>
            <div class="layui-input-inline">
                <script id="container" value="{{$data->infor_content}}" name="infor_content" type="text/plain" style="width:450px;height:100px">
                    {{$data->infor_content}}
                </script>
                <script type="text/javascript">
                var ue = UE.getEditor('container');
                ue.ready(function () {
                    //此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
                    ue.execCommand('serverparam', '_token', TOKEN);
                });
                </script>vc
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

