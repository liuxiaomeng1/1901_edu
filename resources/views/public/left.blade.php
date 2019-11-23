<div class="left-nav">
    <div id="side-nav">
        <ul id="nav">

            <li class="list" >
                <a href="javascript:;">
                    <i class="iconfont">&#xe6a3;</i>
                    管理员管理
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
            <!-- <ul class="sub-menu">
                                <li>
                                    <a href="{{url('/landing/admin')}}">
                                        <i class="iconfont">&#xe6a7;</i>
                                        管理员添加
                                    </a>
                                </li>
                            </ul> -->

            <!-- <ul class="sub-menu">
                            <li>
                                <a href="{{url('/landing/admin_list')}}">
                                    <i class="iconfont">&#xe6a7;</i>
                                    管理员列表
                                </a>
                            </li>
                        </ul> -->


                <ul class="sub-menu">
                    <li>
                        <a class="J_menuItem" href="{{url('/admin')}}">管理员管理</a>
                    </li>
                    <li>
                        <a class="J_menuItem" href="{{url('/role')}}">角色管理</a>
                    </li>
                <!-- <li>
                        <a class="J_menuItem" href="{{url('/lecturerIndex')}}">讲师管理</a>
                     </li> -->
                </ul>
            </li>
            <li class="list" >
                <a href="javascript:;">
                    <i class="iconfont">&#xe6a3;</i>
                    咨询管理
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu" style="display:none">
                    <li>
                        <a href="{{url('consulting/add')}}">
                            <i class="iconfont">&#xe6a7;</i>
                            咨询添加
                        </a>
                    </li>
                    <li>
                        <a href="{{url('consulting/index')}}">
                            <i class="iconfont">&#xe6a7;</i>
                            咨询列表
                        </a>
                    </li>
                </ul>
            </li>
            <li class="list" >
                <a href="javascript:;">
                    <i class="iconfont">&#xe6a3;</i>
                    收藏夹管理
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu" style="display:none">
                    <li>
                        <a href="{{url('collection/index')}}">
                            <i class="iconfont">&#xe6a7;</i>
                            收藏夹列表
                        </a>
                    </li>
                    <li>
                        <a href="{{url('collection/coll_index')}}">
                            <i class="iconfont">&#xe6a7;</i>
                            收藏详细列表
                        </a>
                    </li>
                </ul>
            </li>

            {{--<li class="list" >--}}
                {{--<a href="javascript:;">--}}
                    {{--<i class="iconfont">&#xe6a3;</i>--}}
                    {{--问答管理--}}
                    {{--<i class="iconfont nav_right">&#xe697;</i>--}}
                {{--</a>--}}
                {{--<ul class="sub-menu" style="display:none">--}}
                    {{--<li>--}}
                        {{--<a href="/questions/questions">--}}
                            {{--<i class="iconfont">&#xe6a7;</i>--}}
                            {{--问题添加--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="/questions/questions_list">--}}
                            {{--<i class="iconfont">&#xe6a7;</i>--}}
                            {{--问题列表--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            <li class="list" >
                <a href="javascript:;">
                    <i class="iconfont">&#xe6a3;</i>
                    讲师管理
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu" style="display:none">
                    <li>
                        <a href="/class/add">
                            <i class="iconfont">&#xe6a7;</i>
                            讲师添加
                        </a>
                    </li>
                </ul>
            </li>
            <li class="list" >
                <a href="javascript:;">
                    <i class="iconfont">&#xe6a3;</i>
                    笔记
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu" style="display:none">
                    <li>
                        <a href="/class/create">
                            <i class="iconfont">&#xe6a7;</i>
                            添加笔记
                        </a>
                    </li>
                </ul>
            </li>
            <li class="list" >
                <a href="javascript:;">
                    <i class="iconfont">&#xe6a3;</i>
                    课程管理
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu" style="display:none">
                    <li>
                        <a href="/class/class_cate_add">
                            <i class="iconfont">&#xe6a7;</i>
                            分类添加
                        </a>
                    </li>
                    <li>
                        <a href="/class/class_cate_list">
                            <i class="iconfont">&#xe6a7;</i>
                            分类展示
                        </a>
                    </li>
                    <li>
                        <a href="/class/class_add">
                            <i class="iconfont">&#xe6a7;</i>
                            课程添加
                        </a>
                    </li>
                    <li>
                        <a href="/class/class_list">
                            <i class="iconfont">&#xe6a7;</i>
                            课程展示
                        </a>
                    </li>
                </ul>
            </li>

            <li class="list" >
                <a href="javascript:;">
                    <i class="iconfont">&#xe6a3;</i>
                    前台轮播图
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu" style="display:none">
                    <li>
                        <a href="{{url('slide/add')}}">
                            <i class="iconfont">&#xe6a7;</i>
                            轮播图添加
                        </a>
                    </li>
                    <li>
                        <a href="{{url('slide/index')}}">
                            <i class="iconfont">&#xe6a7;</i>
                            轮播图列表
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div>