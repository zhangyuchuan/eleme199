
<!-- saved from url=(0026)http://waimai.com/register -->
<html class="no-js" lang="zh"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><link class="usemin" rel="stylesheet" href="/home/register_files/global_rebuild.a739f3af.css">
    <link class="usemin" rel="stylesheet" href="/home/register_files/account_rebuild.54cf8909.css">






    <title> 注册- 页面</title>
    <meta name="csrf-token" content="WgAAB8QXyAqVNFKFt3s1lM1LlywEBAvrOxMarHd6">

    <link class="usemin" rel="stylesheet" href="/home/register_files/global_rebuild.a739f3af.css">
    <link class="usemin" rel="stylesheet" href="/home/register_files/account_rebuild.54cf8909.css">

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
            <ul>
                <li id="errorname" class="error" style="color:red"></li>
                <li id="erroremail" class="error" style="color:red"></li>
            </ul>
        </div>

        <div class="panel-bd">
            <form id="register_form" class="form" action="http://waimai.com/register" method="post">
                <div class="form-item">
                    <input type="hidden" name="_token" value="WgAAB8QXyAqVNFKFt3s1lM1LlywEBAvrOxMarHd6">
                    <input id="register_username" class="inputbox js_inputbox async" name="name" type="text" minlength="6" maxlength="18" placeholder="用户名" required="" value="">
                    <div class="g-error-tip hide"></div>
                </div>
                <div class="form-item">
                    <input id="register_email" class="inputbox js_inputbox async" name="email" type="text" placeholder="电子邮箱" required="" value="">
                    <div class="g-error-tip hide"></div>
                </div>
                <div class="form-item">
                    <input id="register_password" class="inputbox js_inputbox" name="password" type="password" minlength="6" maxlength="18" placeholder="密码" required="">
                    <div class="g-error-tip hide"></div>
                </div>
                <div class="form-item">
                    <input id="register_repeat_password" class="inputbox js_inputbox" name="repwd" type="password" minlength="6" maxlength="18" placeholder="确认密码" required="">
                    <div class="g-error-tip hide"></div>
                </div>
                <div class="form-item clrfix">
                    <input id="captcha_input" class="inputbox input-captcha" type="text" name="code" minlength="4" maxlength="4" placeholder="验证码" autocomplete="off" required="">
                    <div class="g-error-tip hide"></div>
                    <img id="captcha_img" class="captcha-img" data-action="login" src="/home/register_files/9" alt="验证码" onclick="this.src=&#39;http://waimai.com/code/captcha/9?&#39;+Math.random()" title="请填写验证码">
                </div>
                <div class="form-helper form-text">
                    <a class="g-link" href="http://waimai.com/agreement" target="_blank">使用条款和协议</a>
                </div>
                <button id="btn" class="g-btn g-btn-l g-btn-submit" type="submit">同意协议并注册</button>
            </form>
        </div>
        <div class="panel-ft">
            <div class="g-oauth">
            </div>
            <a class="g-link" href="http://waimai.com/login">登录</a>
        </div>
    </div>
</div>



<footer class="site-footer group" role="contentinfo">
    <div class="container">
        <p class="sfooter-line"> <a class="sfooter-link" href="http://kaidian.ele.me/">我要开店</a> | <a class="sfooter-link" href="http://waimai.com/register">联系我们</a> | <a class="sfooter-link" href="http://waimai.com/register">服务条款和协议</a> | <a class="sfooter-link" href="http://waimai.com/">站点地图</a>
        </p></div>
</footer>


<script type="text/javascript" src="/home/register_files/jquery-1.8.3.min.js.下载"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>

<script type="text/javascript">

    $(".async").on('blur',function(){

        var name = $(this).attr('name');

        var val = $(this).val();

        $.ajax({
            type: "post",
            url: "http://waimai.com/zcajax",
            data: {'name':name,'val':val},
            success:function(data){
                if(name=='name'){
                    if(data==1){
                        $('#error'+name).text('用户名已存在');
                        $('#btn').on('click',function(){
                            return false;
                        })
                    }else{
                        $('#error'+name).text('');
                        $('#btn').unbind('click');
                    }

                }

                if(name=='email'){
                    if(data==2){
                        $('#error'+name).text('邮箱已被注册');
                        $('#btn').on('click',function(){
                            return false;
                        })
                    }else{
                        $('#error'+name).text('');
                        $('#btn').unbind('click');
                    }
                }
            },

            dataType:'json',
        });

    });
</script>


</body></html>