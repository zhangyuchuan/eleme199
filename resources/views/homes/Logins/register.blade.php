<html class="no-js" lang="zh"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><link class="usemin" rel="stylesheet" href="/home/register_files/global_rebuild.a739f3af.css">
    <link class="usemin" rel="stylesheet" href="/home/register_files/account_rebuild.54cf8909.css">
    <title>注册</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link class="usemin" rel="stylesheet" href="/home/register_files/global_rebuild.a739f3af.css">
    <link class="usemin" rel="stylesheet" href="/home/register_files/account_rebuild.54cf8909.css">
    <script type="text/javascript" src="/home/register_files/jquery-1.8.3.min.js"></script>
    <script src="{{asset('Admin/lib/layui/layui.js')}}" charset="utf-8"></script>
    <script type="text/javascript" src="{{asset('Admin/js/xadmin.js')}}"></script>
</head>
<body class="page-account">
<header class="header">
    <img class="logo-img" src="/home/register_files/logo.b38593f4.png" alt="ele.me| 叫外卖？上饿了么！">
</header>
<div class="container clrfix">
    <aside class="banner">
        <img class="img" src="/home/register_files/banner-app.75596728.png" alt="随时随地轻松订餐">
    </aside>
    <div class="panel">
        <div class="panel-hd clrfix">
            <h2 class="title">注册</h2>
        </div>
        <div class="alert alert-danger">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @if(is_object($errors))
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        @else
                            <li>{{ $errors }}</li>
                        @endif
                    </ul>
                </div>
            @endif
        </div>
        <div class="panel-bd">
            <form id="register_form" class="layui-form" >
                <div class="form-item">
                    <input id="register_username" lay-verify="name" class="inputbox js_inputbox async" name="username" type="text" minlength="4" maxlength="16" placeholder="用户名4~16位" required="" value="">
                    <div class="g-error-tip hide"></div>
                </div>
                <div class="form-item">
                    <input id="register_password" lay-verify="password"  class="inputbox js_inputbox" name="password" type="password" minlength="4" maxlength="16" placeholder="密码4~16位" required="">
                    <div class="g-error-tip hide"></div>
                </div>
                <div class="form-item">
                    <input id="register_repeat_password" lay-verify="repwd"  class="inputbox js_inputbox" name="repwd" type="password" minlength="4" maxlength="16" placeholder="确认密码4~16位" required="">
                    <div class="g-error-tip hide"></div>
                </div>
                <div class="form-item clrfix">
                    <input style="width:150px" id="captcha_input" class="inputbox input-captcha" type="text" name="yzm" minlength="4" maxlength="4" placeholder="验证码" autocomplete="off" required="">
                    <div class="g-error-tip hide"></div>
                    <a href="javascript:;" onclick='javascript:re_captcha()'><img src="{{ url('admin/code/captcha/1') }}" id="123456" alt="" style="width:120px;height:42px;vertical-align:top" ></a>
                </div>
                <div class="form-helper form-text">
                    <a class="g-link" href="http://waimai.com/agreement" target="_blank">使用条款和协议</a>
                </div>
                <button id="btn" lay-filter="add" class="g-btn g-btn-l g-btn-submit" lay-submit="">同意协议并注册</button>
            </form>
        </div>
        <div class="panel-ft">
            <div class="g-oauth">
            </div>
            <a class="g-link" href="{{url('home/login')}}">登录</a>
        </div>
    </div>
</div>
<footer class="site-footer group" role="contentinfo">
    <div class="container">
        <p class="sfooter-line"> <a class="sfooter-link" href="http://kaidian.ele.me/">我要开店</a> | <a class="sfooter-link" href="http://waimai.com/register">联系我们</a> | <a class="sfooter-link" href="http://waimai.com/register">服务条款和协议</a> | <a class="sfooter-link" href="http://waimai.com/">站点地图</a>
        </p></div>
</footer>
<script>
    //生成验证码
    function re_captcha() {
        $url = "{{ URL('admin/code/captcha') }}";
        $url = $url + "/" + Math.random();
        document.getElementById('123456').src = $url;
    }
    layui.use(['form','layer'], function(){
        $ = layui.jquery;
        var form = layui.form
            ,layer = layui.layer;
        //自定义验证规则
        form.verify({
            name: [/^[\S]{4,16}$/,'用户名必须4到16位，且不能出现空格'],
            // email:[/^\w{3,12}@\w{1,12}\.(com|cn|net)$/,'邮箱格式不正确'],
            password: [/^[\S]{4,16}$/,'密码必须4到16位，且不能出现空格'],
            repwd: function(value){
                if(jQuery('#register_password').val()!=jQuery('#register_repeat_password').val()){
                    return '两次密码不一致';
                }
            }
        });
        form.on('submit(add)', function(data){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:'/home/doregister',
                //layui表单提交
                data:data.field,
                dataType:'json',
                type:'post',
                success:function(data){
                    console.log(data);
                    if(data.status==1){
                        layer.alert(data.msg,{icon:5,time:2000},function(){
                            //关闭弹层，刷新父页面
                            // parent.location.reload();
                        })
                    }else{
                        layer.alert(data.msg,{icon:6,time:2000},function(){
                            // //关闭弹层，跳转首页
                            location.href=data.path;
                        })
                    }
                }
            });
            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        });
    });
</script>
{{--<script type="text/javascript">--}}
    {{--$(".async").on('blur',function(){--}}
        {{--var name = $(this).attr('name');--}}
        {{--var val = $(this).val();--}}
        {{--$.ajax({--}}
            {{--type: "post",--}}
            {{--url: "http://waimai.com/zcajax",--}}
            {{--data: {'name':name,'val':val},--}}
            {{--success:function(data){--}}
                {{--if(name=='name'){--}}
                    {{--if(data==1){--}}
                        {{--$('#error'+name).text('用户名已存在');--}}
                        {{--$('#btn').on('click',function(){--}}
                            {{--return false;--}}
                        {{--})--}}
                    {{--}else{--}}
                        {{--$('#error'+name).text('');--}}
                        {{--$('#btn').unbind('click');--}}
                    {{--}--}}
                {{--}--}}
                {{--if(name=='email'){--}}
                    {{--if(data==2){--}}
                        {{--$('#error'+name).text('邮箱已被注册');--}}
                        {{--$('#btn').on('click',function(){--}}
                            {{--return false;--}}
                        {{--})--}}
                    {{--}else{--}}
                        {{--$('#error'+name).text('');--}}
                        {{--$('#btn').unbind('click');--}}
                    {{--}--}}
                {{--}--}}
            {{--},--}}
            {{--dataType:'json',--}}
        {{--});--}}
    {{--});--}}
{{--</script>--}}
</body></html>