<!DOCTYPE html>
<!-- saved from url=(0023)http://waimai.com/login -->
<html class="no-js" lang="zh"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title> 登录- 页面</title>
    <meta name="csrf-token" content="WgAAB8QXyAqVNFKFt3s1lM1LlywEBAvrOxMarHd6">

    <link class="usemin" rel="stylesheet" href="/home/login_files/global_rebuild.a739f3af.css">
    <link class="usemin" rel="stylesheet" href="/home/login_files/account_rebuild.54cf8909.css">

</head>
<body class="page-account">
<header class="header">
    <img class="logo-img" src="/home/login_files/logo.b38593f4.png" alt="ele.me| 叫外卖？上饿了么！">
</header>

<div class="container clrfix">
    <aside class="banner">
        <img class="img" src="/home/login_files/banner-app.75596728.png" alt="随时随地轻松订餐">
    </aside>
    <div class="panel">
        <div class="panel-hd clrfix">
            <h2 class="title">登录</h2>
        </div>




        <div class="panel-bd">

            <form id="login_form" class="login-form block" action="http://waimai.com/login" method="post">
                <div class="form-item">
                    <input type="hidden" name="_token" value="WgAAB8QXyAqVNFKFt3s1lM1LlywEBAvrOxMarHd6">
                    <input class="inputbox" name="name" type="text" minlength="6" placeholder="用户名/电子邮箱/手机号" required="" value="">
                    <div class="g-error-tip hide"></div>
                </div>
                <div class="form-item">
                    <input class="inputbox" name="password" type="password" minlength="6" maxlength="18" placeholder="密码" required="">
                    <div class="g-error-tip hide"></div>
                </div>
                <div class="form-item clrfix">
                    <input id="captcha_input" class="inputbox input-captcha" type="text" name="code" minlength="4" maxlength="4" placeholder="验证码" autocomplete="off" required="">
                    <div class="g-error-tip hide"></div>
                    <img id="captcha_img" class="captcha-img" data-action="login" src="/home/login_files/9" alt="验证码" onclick="this.src=&#39;http://waimai.com/code/captcha/9?&#39;+Math.random()" title="请填写验证码">
                </div>
                <div class="form-helper">
                    <label class="login-checkbox"> <input class="login-remember" type="checkbox" name="remember" checked=""> 下次自动登录 </label>
                    <a class="g-link js_link_register" href="javascript:;">忘记密码</a>
                </div>
                <button class="g-btn g-btn-l g-btn-submit" type="submit">登录</button>
            </form>

        </div>
        <div class="panel-ft">
            <a class="g-btn g-btn-l g-btn-submit" href="javascript:;">免费注册</a>
        </div>
    </div>
</div>



<footer class="site-footer group" role="contentinfo">
    <div class="container">
        <p class="sfooter-line"> <a class="sfooter-link" href="javascript:;">我要开店</a> | <a class="sfooter-link" href="http://waimai.com/login">联系我们</a> | <a class="sfooter-link" href="http://waimai.com/login">服务条款和协议</a> | <a class="sfooter-link" href="http://waimai.com/">站点地图</a>
        </p></div>
</footer>


<script type="text/javascript" src="/home/login_files/jquery-1.8.3.min.js.下载"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>



</body></html>