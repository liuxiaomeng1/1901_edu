<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台登录-X-admin1.1</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/css/font.css">
	<link rel="stylesheet" href="/css/xadmin.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/Swiper/3.4.2/css/swiper.min.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.bootcss.com/Swiper/3.4.2/js/swiper.jquery.min.js"></script>
    <script src="/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/js/xadmin.js"></script>

</head>
<body>
    <div class="login-logo"><h1>在线教育-管理员登陆</h1></div>
    <div class="login-box">
        <form class="layui-form layui-form-pane" action=""  class="form">
              
            <h3>登录你的帐号</h3>
            <label class="login-title" for="username">帐号</label>
            <div class="layui-form-item">
                <label class="layui-form-label login-form"><i class="iconfont">&#xe6b8;</i></label>
                <div class="layui-input-inline login-inline">
                  <input type="text" name="admin_name"   lay-verify="required" placeholder="请输入你的帐号" autocomplete="off" class="layui-input admin_name">
                </div>
            </div>
            <label class="login-title" for="password">密码</label>
            <div class="layui-form-item">
                <label class="layui-form-label login-form"><i class="iconfont">&#xe82b;</i></label>
                <div class="layui-input-inline login-inline">
                  <input type="password" name="password"  lay-verify="required" placeholder="请输入你的密码" autocomplete="off" class="layui-input password">
                </div>
            </div>
            <div class="form-actions">
                <button class="btn btn-warning pull-right btn_yes" lay-submit lay-filter="login"  type="sutton" >登录</button> 
                <div class="forgot"><a href="#" class="forgot">忘记帐号或者密码</a></div>     
            </div>
        </form>
    </div>
	<div class="bg-changer">
        <div class="swiper-container changer-list">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img class="item" src="/images/a.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/images/b.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/images/c.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/images/d.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/images/e.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/images/f.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/images/g.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/images/h.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/images/i.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/images/j.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/images/k.jpg" alt=""></div>
                <div class="swiper-slide"><span class="reset">初始化</span></div>
            </div>
        </div>
        <div class="bg-out"></div>
        <div id="changer-set"><i class="iconfont">&#xe696;</i></div>   
    </div>
    
     
    <script>
      
            $(function(){
                // alert(1);
                layui.use(['form'],function(){
                    $('.btn_yes').click(function(){
                        // alert(0);die;
                        var admin_name=$('.admin_name').val();
                        var password=$('.password').val();
                        // alert(password);die;


                    //表单令牌攻击
                 $.ajaxSetup({
                     headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.post(
                '/landing/create_do',
                {admin_name:admin_name,password:password},
                function(res){
                    // console.log(res);
                    if(res.code==1){
                        layer.msg(res.font,{icon:res.code});

                        location.href="{{url('/admin/index')}}";
                    }else{
                        layer.msg(res.font,{icon:res.code});
                    }

                },
                'json'
            );
            return false;



                    })
                })
            });
        
       

    
            
    </script>
    <!-- <script>
    //百度统计可去掉
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
      var s = document.getElementsByTagName("script")[0]; 
      s.parentNode.insertBefore(hm, s);
    })();
    </script> -->
</body>
</html>