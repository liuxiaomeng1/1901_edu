@extends('layouts.app')
@section('title','在线教育系统')



@section('content')
    @include('public/left')
        <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
          
           <button class="layui-btn" onclick="member_add('添加用户','member-add.html','600','500')"><i class="layui-icon">&#xe608;</i>添加</button></xblock>
            <table class="layui-table">
                <thead>
                    <tr>
                        
                         <th>    <input type="checkbox" name="" value="">  </th>
                                 <th>     ID           </th>
                                 <th>     用户名      </th>
                                 <th>       密码    </th>
                                 <th>   电话号码        </th>
                                 <th>    邮箱    </th>
                                 <th>  加入时间 </th>
                                 <th>    操                    作  </th>
                        
                    </tr>
                            @if($data)
                            @foreach($data as $v)

                             <tr>
                        
                        <th>    <input type="checkbox" name="" value="">  </th>
                                <th> {{$v->admin_id}} </th>
                                <th> {{$v->admin_name}} </th>
                                <th> {{$v->password}} </th>
                                <th> {{$v->mobiletel}} </th>
                                <th> {{$v->email}} </th>
                                <th> {{date('Y-m-d  H:i:s',$v->create_time)}} </th>
                                <th>
                                     <a href="{{url('/landing/admin_del')}}?admin_id={{$v->admin_id}}">删除 </a> 
                                     <a href="{{url('/landing/admin_edit')}}?admin_id={{$v->admin_id}}">编辑 </a>
                                 </th>
                          
                                
                       
                   </tr>
                            @endforeach
                            @endif
                </thead>
              
            </table>
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>
        <!-- 右侧主体结束 -->
        @endsection
