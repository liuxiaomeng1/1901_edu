@extends('layouts.app')
@section('title','在线教育系统')



@section('content')
    @include('public/left')
<!-- {{--    <form action="{{url('role_insert')}}" method="post">--}} -->
         <!-- 右侧主体开始 -->
         <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <div class="layui-form-item">
                            <label for="L_username" class="layui-form-label">
                                <span class="x-red">*</span>角色名称：
                            </label>
                            <div class="layui-input-inline">
                                <input type="text"  name="role_name" required="" lay-verify="nikename"
                                autocomplete="off" class="layui-input">
                            </div>
                        </div>

        <!-- <table  class="table">
            <tr>
                <td>
                    角色名称:
                    <input type="text" name="role_name" id="">
                </td>
            </tr> -->
            <!-- <tr>
                <td>
                    角色介绍:
                    <textarea name="description" id="description" cols="30" rows="10"></textarea>
                </td>
            </tr> -->

            <div class="layui-form-item layui-form-text">
                 <label class="layui-form-label">角色介绍：</label>
             <div class="layui-input-block">
                  <textarea name="description" id="description" placeholder="请输入内容" class="layui-textarea"></textarea>
          </div>
            </div>

            <!-- <tr>
                <td>
                    <input type="submit" value="提交">
                </td>
            </tr> -->
             <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button  class="layui-btn" lay-filter="add" lay-submit="" id="submit">
                        提交
                    </button>
                </div>
        </table>  
<!-- <!-- {{--    </form>--}} -->
    <script>
        $('#submit').on('click',function () {
            var description = $('#description').val();
            var role_name = $('[type="text"]').val();
            if(description == '' || role_name==''){
                alert('不能为空');return;
            }
            $.ajax({
                url : 'role_insert',
                data : {description:description,role_name:role_name},
                type : 'post',
                dataType : 'json',
                success : function (res) {
                    alert(res.msg);
                    if(res.code == 200){
                        location.href = 'right?role_id='+res.role_id+'&&'+'right_id=17';
                    }
                }
            })
        })
    </script>
      <!-- 右侧内容框架，更改从这里结束 -->
      </div>
        </div>
        <!-- 右侧主体结束 -->
     @endsection
