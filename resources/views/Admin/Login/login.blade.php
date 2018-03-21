<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台登录-X-admin2.0</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/admin/css/font.css">
	<link rel="stylesheet" href="/admin/css/xadmin.css">
    <script type="text/javascript" src="/admin/js/jquery.min.js"></script>
    <script src="/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/admin/js/xadmin.js"></script>


</head>
<body class="login-bg">
    
    <div class="login">
        <div class="message">想吃就吃-管理登录</div>
        <div id="darkbannerwrap"></div>
        
        <form method="post" class="layui-form"  action="{{ url('admin/doLogin') }}">
            {{ csrf_field() }}
            <input name="username" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
            <hr class="hr15">
            <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
            <hr class="hr15">
            <input name="code" lay-verify="required" placeholder="验证码"  id="codeval" type="text" class="layui-input"style="width: 150px;float: left;"><span></span>
            {{--<img src="/code/captcha" alt="验证码" title="点击刷新" onclick="this.src='this.src?'+Math.rendom();" style="float: right;">--}}
            <a href="javascript:;" onclick='javascript:re_captcha()'><img src="{{ url('code/captcha/1') }}" id="codes" alt="验证码" title="点击刷新" style="width:150px;height:50px;float:right;margin-right: 5px"></a>
            <hr class="hr15">
            @if(session('msg'))
            <span style="color: #c7254e;font-size: large;">
                    {{ session('msg') }}
                </span>
            @endif
            <hr class="hr15">
            <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
            <hr class="hr20" >
        </form>
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var codes = $('#codeval');

            $('#codeval').blur(function(){
                var cval = codes.val();
                // console.log(cval);
                $.get('/admin/code',{'a':cval},function(data){
                    if (data == 1){
                        codes.next().text('√');
                        codes.next().css('color','green');
                    }else{
                        codes.next().text('X');
                        codes.next().css('color','red');
                    }
                    // console.log(data);
                });
            })

            function re_captcha() {
                $url = "{{ url('code/captcha') }}";
                $url = $url + "/" + Math.random();
                document.getElementById('codes').src = $url;
            }
        </script>
    </div>



    
    <!-- 底部结束 -->
    {{--<script>--}}
    {{--//百度统计可去掉--}}
    {{--var _hmt = _hmt || [];--}}
    {{--(function() {--}}
      {{--var hm = document.createElement("script");--}}
      {{--hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";--}}
      {{--var s = document.getElementsByTagName("script")[0]; --}}
      {{--s.parentNode.insertBefore(hm, s);--}}
    {{--})();--}}
    {{--</script>--}}
</body>
</html>