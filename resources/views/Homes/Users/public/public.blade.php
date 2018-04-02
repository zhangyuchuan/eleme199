<!doctype html>
<html app="eleme" perf-error="desktop/">

<head>
    <meta charset="utf-8" />
    <meta name="renderer" content="webkit" />
    <meta dynamic-meta name="mobile-agent" content="format=html5; url=http://m.ele.me/place/"
    />
    <title bind="SEO.title">
        @yield('title')
    </title>
    <meta dynamic-meta name="description" content="饿了么是中国专业的网上订餐平台，目前已覆盖北京、上海、杭州、广州等300多个城市，提供各类中式、日式、韩式、西式、下午茶、夜宵等优质美食，并提供送餐上门服务，让订餐更加轻松，叫外卖就上饿了么！">
    <meta dynamic-meta name="keywords" content="饿了么，网上订餐，外卖，快餐外卖，外卖网">
    <meta name="format-detection" content="telephone=no, email=no" />
    <meta name="application-name" content="饿了么网上订餐" />
    <meta name="msapplication-tooltip" content="饿了么网上订餐" />
    <meta name="msapplication-starturl" content="/home/" />
    <meta name="msapplication-tileimage" content="=http://static11.elemecdn.com/apple-touch-icon.png?v=2"
    />
    <meta name="msapplication-tilecolor" content="#0088ff" />
    <meta name="msapplication-task" content="name=切换地区;action-uri=http://ele.me/home;icon-uri=http://static11.elemecdn.com/apple-touch-icon.png?v=2"
    />
    <meta name="msapplication-task" content="name=我要订餐;action-uri=http://ele.me?from=IE;icon-uri=http://static11.elemecdn.com/apple-touch-icon.png?v=2"
    />
    <meta name="msapplication-task" content="name=订单中心;action-uri=http://ele.me/profile?from=IE;icon-uri=http://static11.elemecdn.com/apple-touch-icon.png?v=2"
    />
    <meta name="msapplication-task" content="name=寻求帮助（HELP）;action-uri=http://ele.me/support?from=IE;icon-uri=http://static11.elemecdn.com/apple-touch-icon.png?v=2"
    />
    <meta property="qc:admins" content="2263606250655" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="apple-touch-icon-precomposed" href="https://static2.ele.me/apple-touch-icon.png?v=2"
    />
    <link rel="shortcut icon" href="//static2.ele.me/eleme/desktop/media/img/favicon-16x16.png"
          type="image/png" />
    <link rel="icon" href="//static2.ele.me/eleme/desktop/media/img/favicon-16x16.png"
          type="image/png" sizes="16x16" />
    <link rel="icon" href="//static2.ele.me/eleme/desktop/media/img/favicon-32x32.png"
          type="image/png" sizes="32x32" />
    <link rel="icon" href="//static2.ele.me/eleme/desktop/media/img/favicon.png"
          type="image/png" sizes="96x96" />
    <link href="/home/css/vendor.d724a8_2.css" rel="stylesheet">
    <link href="/home/css/main.0a7669.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('home/lib/layui/css/layui.css')}}" media="all">
    <!--[if lte IE 8]>
    <script>
        window.location.href = 'https://h.ele.me/activities/landing';
    </script>
    <![endif]-->
    <script src="/home/js/69e30c57868b46e7a0d2b4a6c711970a.js" data-ref="API_CONFIG">
    </script>
    <script src="/home/js/perf.js" type="text/javascript" crossorigin="anonymous">
    </script>
    <script src="/home/js/vendor.8c3a5a.js" type="text/javascript" crossorigin="anonymous">
    </script>
    <script src="/home/js/main.a0cd82.js" type="text/javascript" crossorigin="anonymous">
    </script>
    <script src="/home/js/jquery.min.js"></script>
    <script src="/home/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/home/js/xadmin.js"></script>

</head>
<body cute-title class="{hidesidebar: layoutState && layoutState.hideSidebar, smallbody: layoutState.smallBody, whitebody: layoutState.whiteBody}">
<!-- <eleme-topbar state="layoutState"></eleme-topbar> -->
<div class="isolate-scope" switch="state.type" state="layoutState">
    <div class="scope isolate-scope" switch-default="" topbar-default=""
         state="state">
        <header class="topbar" role="navigation" class="{shoptopbar: state.type === 'shop'}">
            <div class="container clearfix">
                <h1>
                    <a class="topbar-logo icon-logo" href="/" hardjump="">
                                <span>
                                    饿了么
                                </span>
                    </a>
                </h1>
                <a class="topbar-item topbar-homepage focus" href="/" hardjump="">
                    首页
                </a>
                <a class="topbar-item" href="/profile/order" hardjump="" class="{'focus': $root.locationpath[1] === 'order'}">
                    我的订单
                </a>
                <a class="topbar-item cooperation" href="//h5.ele.me/service/cooperation/"
                   target="_blank">
                    加盟合作
                </a>
                <nav class="topbar-nav">
                    <a class="topbar-nav-link" href="/support/center" hardjump="" target="_blank">
                        <i class="topbar-nav-icon icon-service">
                        </i>
                        服务中心
                    </a>
                    <a class="topbar-nav-link" href="/support/rules/default" hardjump="" target="_blank">
                        规则中心
                    </a>
                    <div class="topbar-nav-link">
                        <i class="topbar-nav-icon icon-mobile">
                        </i>
                        手机应用
                        <div class="dropbox topbar-mobile-dropbox">
                                    <span>
                                        扫一扫, 手机订餐更方便
                                    </span>
                            <img class="topbar-nav-qrcode" src="/home/img/appqc.95e532.png" alt="扫一扫下载饿了么手机 App">
                        </div>
                    </div>
                    <div topbar-profilebox="">
                        <div class="topbar-profilebox">
                                    <span class="topbar-profilebox-avatar icon-profile" show="!$root.user.username">
                                    </span>
                            <span class="" show="!$root.user.username">
                                        <a href="//h5.ele.me//login/#redirect=https%3A%2F%2Fwww.ele.me%2F"
                                           target="_blank" href="//h5.ele.me//login/#redirect=https%3A%2F%2Fwww.ele.me%2F">
                                            登录/注册
                                        </a>
                                    </span>
                            <span class="topbar-profilebox-wrapper hide" show="$root.user.username">
                                        <span class="topbar-profilebox-username binding">
                                        </span>
                                        <span class="topbar-profilebox-btn icon-arrow-down scope" if="$root.topbarType !== 'checkout'">
                                        </span>
                                        <div class="dropbox topbar-profilebox-dropbox">
                                            <a class="icon-profile" href="/profile" hardjump="">
                                                个人中心
                                            </a>
                                            <a class="icon-star" href="/profile/favor" hardjump="">
                                                我的收藏
                                            </a>
                                            <a class="icon-location" href="/profile/address" hardjump="">
                                                我的地址
                                            </a>
                                            <a class="icon-setting" href="/profile/security" hardjump="">
                                                安全设置
                                            </a>
                                            <a class="icon-logout" href="JavaScript:" click="logout()">
                                                退出登录
                                            </a>
                                        </div>
                                    </span>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
    </div>
</div>
<div class="importantnotification container" role="banner">
</div>
<!-- <eleme-importantnotification></eleme-importantnotification> -->
<div class="sidebar" role="complementary" hide="layoutState && layoutState.hideSidebar">
    <div class="sidebar-tabs">
        <div class="toolbar-tabs-middle">
            <a class="toolbar-btn icon-order toolbar-close" href="/profile/order"
               hardjump="" tooltip="我的订单" tooltip-placement="left" ubt-click="toolbar_order">
            </a>
            <div class="toolbar-separator">
            </div>
            <a class="toolbar-cartbtn icon-cart toolbar-open" href="JavaScript:" template="cart"
               class="{'focus': (activeTemplate === 'cart' && isSidebarOpen), 'toolbar-cartbtn-shownum': foodCount.count}"
               ubt-click="390">
                购物车
            </a>
            <div class="toolbar-separator">
            </div>
            <a class="toolbar-btn icon-notice toolbar-open modal-hide" href="JavaScript:"
               template="message" class="{'focus': (activeTemplate === 'message' && isSidebarOpen), 'toolbar-open': user, 'modal-hide': user}"
               tooltip="我的信息" tooltip-placement="left" ubt-click="392">
            </a>
        </div>
        <div class="toolbar-tabs-bottom">
            <div class="toolbar-btn icon-QR-code">
                <div class="dropbox toolbar-tabs-dropbox">
                    <a href="http://static11.elemecdn.com/eleme/desktop/mobile/index.html"
                       target="_blank">
                        <img src="/home/img/appqc.95e532.png" alt="下载手机应用">
                        <p>
                            下载手机应用
                        </p>
                        <p class="icon-QR-code-bonus">
                            即可参加分享红包活动
                        </p>
                    </a>
                </div>
            </div>
            <a id="live800iconlink" class="toolbar-btn icon-service" online-service=""
               tooltip="在线客服" title="在线客服" tooltip-placement="left" target="_blank" href="JavaScript:"
               style="visibility: hidden;">
            </a>
            <a class="toolbar-btn sidebar-btn-backtop icon-top" tooltip="回到顶部" title="回到顶部"
               href="JavaScript:" tooltip-placement="left" style="visibility: hidden;">
            </a>
        </div>
    </div>
    <div class="sidebar-content">
    </div>
</div>
<!-- <eleme-sidebar hide="layoutState && layoutState.hideSidebar"></eleme-sidebar> -->
<!-- <div view role="main"></div> -->
<link href="/home/css/vendor.eb86f5.css" rel="stylesheet">
<link href="/home/css/profile.4b02a0.css" rel="stylesheet">
<div ng-view="" role="main" class="ng-scope">
    <div class="profile-container container" profile-container="" page-title="个人资料"
         page-name="info">
        <div class="clearfix">
            <div class="location" ng-style="{visibility: geohash ? &#39;&#39; : &#39;hidden&#39;}"
                 role="navigation" location="">
                        <span>
                            当前位置:
                        </span>
                <span class="location-current">
                            <a class="inherit ng-binding" ng-href="/place/wx4spk2hgfer" ubt-click="401"
                               ng-bind="place.name || place.address" href="">
                                昌平区204县道(北京市育荣教育园区西)
                            </a>
                        </span>
                <span class="location-change location-hashistory" ng-class="{ &#39;location-hashistory&#39;: user.username &amp;&amp; userPlaces &amp;&amp; userPlaces.length &gt; 0 }">
                            <a ng-href="/home" ubt-click="400" hardjump="" href="">
                                [切换地址]
                            </a>
                            <ul class="dropbox location-dropbox" ubt-visit="398">
                                <li class="arrow">
                                </li>
                                <!-- ngRepeat: userPlace in userPlaces | filter:filterPlace | limitTo:
                                4 -->
                                <li ng-repeat="userPlace in userPlaces | filter:filterPlace | limitTo: 4"
                                    class="ng-scope">
                                    <a class="inherit ng-binding" ng-href="/place/wx4spk2jk0db?latitude=40.102375&amp;longitude=116.334404"
                                       ng-bind="userPlace.name" ubt-click="399" href="">
                                        昌平区204县道(北京市育荣教育园区西)
                                    </a>
                                </li>
                                <!-- end ngRepeat: userPlace in userPlaces | filter:filterPlace | limitTo:
                                4 -->
                                <li class="changelocation">
                                    <a ng-href="/home" hardjump="" href="">
                                        修改收货地址
                                        <span class="icon-location">
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </span>
                <span ng-transclude="">
                            <i class="icon-arrow-right ng-scope">
                            </i>
                            <span class="ng-binding ng-scope">
                                个人资料
                            </span>
                        </span>
            </div>
            <div search-input="">
            </div>
        </div>
        <ul class="profile-sidebar" role="navigation" profile-sidebar="">
            <li class="profile-sidebar-section">
                <h2 class="profile-sidebar-sectiontitle" ng-class="{ active: pageName === &#39;profile&#39; }">
                    <i class="icon-line-home">
                    </i>
                    <a href="">
                        个人中心
                    </a>
                </h2>
            </li>
            <li class="profile-sidebar-section">
                <h2 class="profile-sidebar-sectiontitle">
                    <i class="icon-line-order">
                    </i>
                    我的订单
                </h2>
                <ul>
                    <li ng-class="{ active: pageName === &#39;order&#39; }">
                        <a href="">
                            近三个月订单
                        </a>
                    </li>
                </ul>
            </li>
            <li class="profile-sidebar-section">
                <h2 class="profile-sidebar-sectiontitle">
                    <i class="icon-yen">
                    </i>
                    我的资产
                </h2>
                <ul>
                    <li ng-class="{ active: pageName === &#39;hongbao&#39; }">
                        <a href="">
                            我的红包
                        </a>
                    </li>
                    <li ng-class="{ active: pageName === &#39;balance&#39; }">
                        <a href="">
                            账户余额
                        </a>
                    </li>
                    <li ng-class="{ active: pageName === &#39;points&#39; }">
                        <a href="">
                            我的积分
                        </a>
                    </li>
                </ul>
            </li>
            <li class="profile-sidebar-section">
                <h2 class="profile-sidebar-sectiontitle">
                    <i class="icon-line-profile">
                    </i>
                    我的资料
                </h2>
                <ul>
                    <li ng-class="{ active: pageName === &#39;info&#39; }" class="active">
                        <a href="/data">
                            个人资料
                        </a>
                    </li>
                    <li ng-class="{ active: pageName === &#39;address&#39; }">
                        <a href="/add">
                            地址管理
                        </a>
                    </li>
                    <li ng-class="{ active: pageName === &#39;security-center&#39; }">
                        <a href="/safety">
                            安全中心
                        </a>
                    </li>
                    <li ng-class="{ active: pageName === &#39;changepassword&#39; }">
                        <a href="/password">
                            修改密码
                        </a>
                    </li>
                </ul>
            </li>
            <li class="profile-sidebar-section">
                <h2 class="profile-sidebar-sectiontitle" ng-class="{ active: pageName === &#39;favor&#39; }">
                    <a href="">
                        <i class="icon-order-favor">
                        </i>
                        我的收藏
                    </a>
                </h2>
            </li>
        </ul>
        <div class="profile-panel" role="main">
            @section('content')

            @show

        </div>
    </div>
</div>

<!-- <eleme-footer></eleme-footer> -->
<footer class="footer" role="contentinfo">
    <div class="container clearfix">
        <div class="footer-link">
            <h3 class="footer-link-title">
                用户帮助
            </h3>
            <a class="footer-link-item" href="/support/center" target="_blank">
                服务中心
            </a>
            <a class="footer-link-item" href="/support/question/default" target="_blank">
                常见问题
            </a>
            <a class="footer-link-item" online-service="" href="javascript:" style="visibility: hidden;">
                在线客服
            </a>
        </div>
        <div class="footer-link">
            <h3 class="footer-link-title">
                商务合作
            </h3>
            <a class="footer-link-item" href="//kaidian.ele.me" target="_blank">
                我要开店
            </a>
            <a class="footer-link-item" href="/support/about/jiameng" target="_blank">
                加盟指南
            </a>
            <a class="footer-link-item" href="/support/about/contact" target="_blank">
                市场合作
            </a>
            <a class="footer-link-item" href="http://openapi.eleme.io/" target="_blank">
                开放平台
            </a>
        </div>
        <div class="footer-link">
            <h3 class="footer-link-title">
                关于我们
            </h3>
            <a class="footer-link-item" href="/support/about" target="_blank">
                饿了么介绍
            </a>
            <a class="footer-link-item" href="http://jobs.ele.me/" target="_blank">
                加入我们
            </a>
            <a class="footer-link-item" href="/support/about/contact" target="_blank">
                联系我们
            </a>
            <a class="footer-link-item" href="/support/rules/default" target="_blank">
                规则中心
            </a>
        </div>
        <div class="footer-contect">
            <div class="footer-contect-item">
                24小时客服热线 :
                <a class="inherit" href="tel:10105757">
                    10105757
                </a>
            </div>
            <div class="footer-contect-item">
                意见反馈 :
                <a class="inherit" href="mailto:feedback@ele.me">
                    feedback@ele.me
                </a>
            </div>
            <div class="footer-contect-item">
                关注我们 :
                <div class="icon-wechat" href="JavaScript:" ubt-click="402">
                    <div class="dropbox dropbox-bottom footer-contect-dropbox" ubt-visit="402">
                        <img src="/home/img/wexinqc100@2x.393ade.png" alt="微信号: elemeorder">
                        <p>
                            微信号: elemeorder
                        </p>
                        <p>
                            饿了么网上订餐
                        </p>
                    </div>
                </div>
                <a class="icon-weibo" href="http://e.weibo.com/elemeorder" target="_blank">
                </a>
            </div>
        </div>
        <div class="footer-mobile">
            <a href="https://h.ele.me/landing" target="_blank">
                <img class="footer-mobile-icon" src="/home/img/appqc.95e532.png" alt="扫一扫下载饿了么手机 App">
            </a>
            <div class="footer-mobile-content">
                <h3>
                    下载手机版
                </h3>
                <p>
                    扫一扫,手机订餐方便
                </p>
            </div>
        </div>
        <div class="footer-copyright serif">
            <h5 class="owner">
                所有方：上海拉扎斯信息科技有限公司
            </h5>
            <p>
                增值电信业务许可证 :
                <a href="http://www.shca.gov.cn/" target="_blank">
                    沪B2-20150033
                </a>
                |
                <a href="http://www.miibeian.gov.cn/" target="_blank">
                    沪ICP备 09007032
                </a>
                |
                <a href="http://www.sgs.gov.cn/lz/licenseLink.do?method=licenceView&entyId=20120305173227823"
                   target="_blank">
                    上海工商行政管理
                </a>
                Copyright ©2008-2017 ele.me, All Rights Reserved.
            </p>
        </div>
        <div class="footer-police container">
            <a href="http://www.zx110.org/picp/?sn=310100103568" rel="nofollow" target="_blank">
                <img alt="已通过沪公网备案，备案号 310100103568" src="/home/img/picp_bg.e373b3.jpg" height="30">
            </a>
        </div>
    </div>
</footer>
<script src="/home/js/6936dbf3e7d94cffa954bcbcf2b79f38.js">
</script>

</body>
</html>
