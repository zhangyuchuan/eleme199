<!DOCTYPE html>
<!-- saved from url=(0031)https://www.ele.me/shop/1195106 -->
<html ng-app="eleme" perf-error="desktop/" class="ng-scope">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style type="text/css">
        @charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide{display:none
        !important;}ng\:form{display:block;}.ng-animate-block-transitions{transition:0s
        all!important;-webkit-transition:0s all!important;}.ng-hide-add-active,.ng-hide-remove{display:block!important;}
    </style>
    <meta name="renderer" content="webkit">
    <title ng-bind="SEO.title" class="ng-binding">
        记得回来点单哦！ - 饿了么
    </title>
    <meta name="format-detection" content="telephone=no, email=no">
    <meta name="application-name" content="饿了么网上订餐">
    <meta name="msapplication-tooltip" content="饿了么网上订餐">
    <meta name="msapplication-starturl" content="/home/">
    <meta name="msapplication-tileimage" content="=http://static11.elemecdn.com/apple-touch-icon.png?v=2">
    <meta name="msapplication-tilecolor" content="#0088ff">
    <meta name="msapplication-task" content="name=切换地区;action-uri=http://ele.me/home;icon-uri=http://static11.elemecdn.com/apple-touch-icon.png?v=2">
    <meta name="msapplication-task" content="name=我要订餐;action-uri=http://ele.me?from=IE;icon-uri=http://static11.elemecdn.com/apple-touch-icon.png?v=2">
    <meta name="msapplication-task" content="name=订单中心;action-uri=http://ele.me/profile?from=IE;icon-uri=http://static11.elemecdn.com/apple-touch-icon.png?v=2">
    <meta name="msapplication-task" content="name=寻求帮助（HELP）;action-uri=http://ele.me/support?from=IE;icon-uri=http://static11.elemecdn.com/apple-touch-icon.png?v=2">
    <meta property="qc:admins" content="2263606250655">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="apple-touch-icon-precomposed" href="https://static2.ele.me/apple-touch-icon.png?v=2">
    <link rel="shortcut icon" href="https://static2.ele.me/eleme/desktop/media/img/favicon-16x16.png"
          type="image/png">
    <link rel="icon" href="https://static2.ele.me/eleme/desktop/media/img/favicon-16x16.png"
          type="image/png" sizes="16x16">
    <link rel="icon" href="https://static2.ele.me/eleme/desktop/media/img/favicon-32x32.png"
          type="image/png" sizes="32x32">
    <link rel="icon" href="https://static2.ele.me/eleme/desktop/media/img/favicon.png"
          type="image/png" sizes="96x96">
    <link href="/home/css/vendor.eb86f5.css" rel="stylesheet">
    <link href="/home/css/main.301d40.css" rel="stylesheet">
    <!--[if lte IE 8]>
    <script>
        window.location.href = 'https://h.ele.me/activities/landing';
    </script>
    <![endif]-->
    <script src="/home/elm/api" data-ref="API_CONFIG">
    </script>
    <script src="D:/Desktop/project/www.ele.me/www.elm.com/js/perf.js" type="text/javascript">
    </script>
    <script src="/home/js/vendor.6b3834.js" type="text/javascript">
    </script>
    <script src="/home/js/jquery.min.js">    </script>
    <script src="/home/js/222.js" type="text/javascript">
    </script>
    <!--<base href="/">s-->
    <base href=".">
</head>

<body cute-title="" ng-class="{hidesidebar: layoutState &amp;&amp; layoutState.hideSidebar, smallbody: layoutState.smallBody, whitebody: layoutState.whiteBody}"
      class="hidesidebar" lim:visitorcapacity="1" style="position: relative;">
<div ng-switch="state.type" state="layoutState" class="ng-isolate-scope">
    <!-- ngSwitchWhen: checkout -->
    <!-- ngSwitchDefault: -->
    <div ng-switch-default="" topbar-default="" state="state" class="ng-scope ng-isolate-scope">
        <header class="topbar shoptopbar" role="navigation" ng-class="{shoptopbar: state.type === &#39;shop&#39;}">
            <div class="container clearfix">
                <h1>
                    <a href="https://www.ele.me/" hardjump="" class="topbar-logo icon-logo">
                                <span>
                                    饿了么
                                </span>
                    </a>
                </h1>
                <a href="https://www.ele.me/" hardjump="" class="topbar-item topbar-homepage"
                   ng-class="{&#39;focus&#39;: $root.locationpath[0] === &#39;place&#39;}">
                    首页
                </a>
                <a href="https://www.ele.me/profile/order" hardjump="" class="topbar-item"
                   ng-class="{&#39;focus&#39;: $root.locationpath[1] === &#39;order&#39;}">
                    我的订单
                </a>
                <a href="https://h5.ele.me/service/cooperation/" target="_blank" class="topbar-item cooperation">
                    加盟合作
                </a>
                <nav class="topbar-nav">
                    <a href="https://www.ele.me/support/center" hardjump="" class="topbar-nav-link"
                       target="_blank">
                        <i class="topbar-nav-icon icon-service">
                        </i>
                        服务中心
                    </a>
                    <a href="https://www.ele.me/support/rules/default" hardjump="" class="topbar-nav-link"
                       target="_blank">
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
                            <img src="/home/elm/appqc.95e532.png" class="topbar-nav-qrcode" alt="扫一扫下载饿了么手机 App">
                        </div>
                    </div>
                    <div topbar-profilebox="">
                        <div class="topbar-profilebox">
                            <!-- ngIf: $root.user.avatar && $root.topbarType !==' checkout' -->
                            <span class="topbar-profilebox-avatar icon-profile" ng-show="!$root.user.username">
                                    </span>
                            <span ng-show="!$root.user.username" class="">
                                        <a ng-href="//h5.ele.me//login/#redirect=https%3A%2F%2Fwww.ele.me%2Fshop%2F1195106"
                                           target="_blank" href="https://h5.ele.me//login/#redirect=https%3A%2F%2Fwww.ele.me%2Fshop%2F1195106">
                                            登录/注册
                                        </a>
                                    </span>
                            <span class="topbar-profilebox-wrapper ng-hide" ng-show="$root.user.username">
                                        <!-- ngIf: $root.topbarType===' checkout' -->
                                        <span class="topbar-profilebox-username ng-binding">
                                        </span>
                                <!-- ngIf: $root.topbarType===' checkout' -->
                                <!-- ngIf: $root.topbarType !==' checkout' -->
                                        <span class="topbar-profilebox-btn icon-arrow-down ng-scope" ng-if="$root.topbarType !== &#39;checkout&#39;">
                                        </span>
                                <!-- end ngIf: $root.topbarType !==' checkout' -->
                                        <div class="dropbox topbar-profilebox-dropbox">
                                            <a class="icon-profile" href="https://www.ele.me/profile" hardjump="">
                                                个人中心
                                            </a>
                                            <a class="icon-star" href="https://www.ele.me/profile/favor" hardjump="">
                                                我的收藏
                                            </a>
                                            <a class="icon-location" href="https://www.ele.me/profile/address" hardjump="">
                                                我的地址
                                            </a>
                                            <a class="icon-setting" href="https://www.ele.me/profile/security" hardjump="">
                                                安全设置
                                            </a>
                                            <a class="icon-logout" href="JavaScript:" ng-click="logout()">
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
    <!-- ngIf: enable -->
</div>
<div class="sidebar ng-hide" role="complementary" ng-hide="layoutState &amp;&amp; layoutState.hideSidebar">
    <div class="sidebar-tabs">
        <div class="toolbar-tabs-middle">
            <a class="toolbar-btn icon-order toolbar-close" href="https://www.ele.me/profile/order"
               hardjump="" tooltip="我的订单" tooltip-placement="left" ubt-click="toolbar_order">
                <!-- ngIf: sidebarCount.uncompletedOrder> 0 -->
            </a>
            <div class="toolbar-separator">
            </div>
            <a class="toolbar-cartbtn icon-cart toolbar-open" href="JavaScript:" template="cart"
               ng-class="{&#39;focus&#39;: (activeTemplate === &#39;cart&#39; &amp;&amp; isSidebarOpen), &#39;toolbar-cartbtn-shownum&#39;: foodCount.count}"
               ubt-click="390">
                购物车
                <!-- ngIf: foodCount.count -->
            </a>
            <div class="toolbar-separator">
            </div>
            <a class="toolbar-btn icon-notice toolbar-open modal-hide" href="JavaScript:"
               template="message" ng-class="{&#39;focus&#39;: (activeTemplate === &#39;message&#39; &amp;&amp; isSidebarOpen), &#39;toolbar-open&#39;: user, &#39;modal-hide&#39;: user}"
               tooltip="我的信息" tooltip-placement="left" ubt-click="392">
                <!-- ngIf: messageCount.count -->
            </a>
        </div>
        <div class="toolbar-tabs-bottom">
            <div class="toolbar-btn icon-QR-code">
                <div class="dropbox toolbar-tabs-dropbox">
                    <a href="http://static11.elemecdn.com/eleme/desktop/mobile/index.html"
                       target="_blank">
                        <img src="/home/elm/appqc.95e532.png" alt="下载手机应用">
                        <p>
                            下载手机应用
                        </p>
                        <p class="icon-QR-code-bonus">
                            即可参加分享红包活动
                        </p>
                    </a>
                </div>
            </div>
            <a class="toolbar-btn icon-service" online-service="" tooltip="在线客服" title="在线客服"
               tooltip-placement="left" id="live800iconlink" target="_blank" href="JavaScript:"
               style="visibility: visible;">
            </a>
            <a class="toolbar-btn sidebar-btn-backtop icon-top" tooltip="回到顶部" title="回到顶部"
               href="JavaScript:" tooltip-placement="left" style="visibility: hidden;">
            </a>
        </div>
    </div>
    <div class="sidebar-content">
        <!-- ngInclude: activeTemplate ? ('/common/page/_block/sidebar/sidebar-'+
        activeTemplate + '/sidebar-'+ activeTemplate + '.html') : '' -->
    </div>
</div>
<!-- ngView: -->
<div ng-view="" role="main" class="ng-scope">
    <div class="shopguide ng-isolate-scope" shop-guide="" data="shop" isdisabled="shop.disabled">
        <div class="container" ng-show="shop" itemscope="" itemtype="http://schema.org/Restaurant">
            <div class="shopguide-info">
                <meta itemprop="url" content="https://www.ele.me/shop/1195106">
                <img ng-src="//fuss10.elemecdn.com/3/bf/43ba71d180d43fb084348a40a428fjpeg.jpeg?imageMogr2/thumbnail/95x95/format/webp/quality/85"
                     alt="{{ $shopinfo->name }}" itemprop="image" src="{{ $shopinfo->logo }}">
                <div class="shopguide-info-wrapper">
                    <div>
                        <h1 title="{{ $shopinfo->name }}" ng-class="{hastip: shop.tip}" itemprop="name"
                            class="ng-binding">
                            {{ $shopinfo->name }}
                        </h1>
                        <!-- ngIf: shop.tip -->
                        <a ng-href="/shop/1195106/info" href="/shop/{{ $shopinfo->id }}/info">
                            <!-- ngIf: cityId===6 7 -->
                        </a>
                    </div>
                    <p class="shopguide-info-rate">
                    <div class="starrating icon-star ng-isolate-scope" title="评分4.3分" rate-star=""
                         rating="shop.rating">
                                    <span class="icon-star" ng-style="{ width: (rating * 20) + &#39;%&#39; }"
                                          style="width: 86%;">
                                    </span>
                    </div>
                    (
                    <a ng-href="/shop/1195106/rate" class="ng-binding" href="/shop/{{ $shopinfo->id }}/rate">
                        456
                    </a>
                    )
                    <span class="ng-binding">
                                    月售758单
                                </span>
                    </p>
                    <p>
                        <!-- ngRepeat: flavor in shop.flavor -->
                    </p>
                </div>
                <div class="shopguide-info-extra">
                    <ul>
                        <!-- ngIf: shopRatingScore -->
                        <li class="shopguide-extra-item shopguide-extra-compete ng-scope" ng-if="shopRatingScore">
                            <div itemscope="" itemprop="aggregateRating" itemtype="http://schema.org/AggregateRating">
                                <h2 class="color-stress ng-binding" itemprop="ratingValue">
                                    4.3
                                </h2>
                                <meta itemprop="bestRating" content="5">
                                <meta itemprop="reviewCount" content="456">
                                <p>
                                    综合评价
                                    <br>
                                    <span class="color-mute ng-binding">
                                                高于周边商家
                                            </span>
                                    <!-- ngIf: shopRatingScore.compare_rating -->
                                    <span class="color-stress ng-binding ng-scope" ng-if="shopRatingScore.compare_rating">
                                                62.1%
                                            </span>
                                    <!-- end ngIf: shopRatingScore.compare_rating -->
                                </p>
                            </div>
                            <div>
                                <p>
                                    服务态度
                                <div class="starrating icon-star ng-isolate-scope" title="评分4.3分" rate-star=""
                                     rating="shopRatingScore.service_score">
                                                <span class="icon-star" ng-style="{ width: (rating * 20) + &#39;%&#39; }"
                                                      style="width: 86.2426%;">
                                                </span>
                                </div>
                                <span class="color-stress ng-binding">
                                                4.3分
                                            </span>
                                </p>
                                <p>
                                    菜品评价
                                <div class="starrating icon-star ng-isolate-scope" title="评分4.3分" rate-star=""
                                     rating="shopRatingScore.food_score">
                                                <span class="icon-star" ng-style="{ width: (rating * 20) + &#39;%&#39; }"
                                                      style="width: 86.9696%;">
                                                </span>
                                </div>
                                <span class="color-stress ng-binding">
                                                4.3分
                                            </span>
                                </p>
                            </div>
                        </li>
                        <!-- end ngIf: shopRatingScore -->
                        <!-- ngIf: shop.description -->
                        <li class="shopguide-extra-item ng-binding ng-scope" ng-if="shop.description"
                            itemprop="description">
                            {{ $shopinfo->shopdesc }}
                        </li>
                        <!-- end ngIf: shop.description -->
                        <li class="shopguide-extra-item address">
                            <p itemscope="" itemprop="streetAddress" itemtype="http://schema.org/PostalAddress">
                                        <span class="label">
                                            商家地址：
                                        </span>
                                <span class="ng-binding">
                                           {{ $shopinfo->address }}
                                        </span>
                                <meta itemprop="telephone" content="010-61604876 15001072754">
                            </p>
                            <p>
                                        <span class="label">
                                            营业时间：
                                        </span>
                                <span itemprop="openingHours" class="ng-binding">
                                            {{ $shopinfo->time }}
                                        </span>
                            </p>
                        </li>
                        <li class="shopguide-extra-item">
                            <p class="shopguide-extra-delivery">
                                由
                                <span class="ng-binding">
                                            {{ $shopinfo->name }}
                                        </span>
                                提供配送服务
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="shopguide-server">
                        <span ng-hide="shop.id == 656683" class="">
                            <em>
                                起送价
                            </em>
                            <em class="shopguide-server-value ng-binding">
                                {{ $shopinfo->fsmoney }}元
                            </em>
                        </span>
                <span ng-hide="shop.id == 656683" class="">
                            <em>
                                配送费
                            </em>
                            <em class="shopguide-server-value ng-binding">
                                配送费¥{{ $shopinfo ->sendmoney }}
                            </em>
                    <!-- ngIf: shop.delivery_mode.description -->
                        </span>
                <span ng-hide="shop.id == 656683" class="">
                            <em>
                                平均送达速度
                            </em>
                            <em class="shopguide-server-value ng-binding">
                               {{ $shopinfo->finishtime }}分钟
                            </em>
                        </span>
            </div>
            <a class="shopguide-favor" href="javascript:" ng-click="favor()">
                <!-- ngIf: isFavorShop -->
                <!-- ngIf: !isFavorShop -->
                <i ng-if="!isFavorShop" class="icon-favorite ng-scope">
                </i>
                <!-- end ngIf: !isFavorShop -->
                <!-- ngIf: isFavorShop -->
                <!-- ngIf: !isFavorShop -->
                <span ng-if="!isFavorShop" class="ng-scope">
                            收藏
                        </span>
                <!-- end ngIf: !isFavorShop -->
            </a>
        </div>
    </div>
    <div shop-nav="" data="shop" filter-data="shop.filter" display-type="shop.displayType"
         shop-action="shopAction" class="ng-scope ng-isolate-scope">
        <div class="shopnav">
            <div class="container clearfix">
                <div class="shopnav-left">
                    <a class="shopnav-tab active" href="/shop/{{ $shopinfo->id }}" ng-class="{active: shop.tab === &#39;index&#39;}">
                        所有商品
                    </a>
                    <a class="shopnav-tab" href="/shop/{{ $shopinfo->id }}/rate" ng-class="{active: shop.tab === &#39;rate&#39;}">
                        评价
                    </a>
                    <a class="shopnav-tab" href="/shop/{{ $shopinfo->id }}/info" ng-class="{active: shop.tab === &#39;info&#39;}">
                        商家资质
                    </a>
                    <!-- ngIf: shopAction===' menu' -->
                    <span class="shopnav-filter ng-scope" ng-if="shopAction === &#39;menu&#39;">
                                <a href="javascript:" ng-click="filter(&#39;default&#39;)" ng-class="{active: filterData === &#39;default&#39;}"
                                   class="active">
                                    默认排序
                                </a>
                                <a href="javascript:" ng-click="filter(&#39;-rating&#39;)" ng-class="{active: filterData === &#39;-rating&#39;}">
                                    评分
                                    <i class="icon-uniE02D">
                                    </i>
                                </a>
                                <a href="javascript:" ng-click="filter(&#39;-month_sales&#39;)" ng-class="{active: filterData === &#39;-month_sales&#39;}">
                                    销量
                                    <i class="icon-uniE02D">
                                    </i>
                                </a>
                                <a href="javascript:" ng-click="filter(&#39;-price&#39;)" ng-class="{active: filterData === &#39;-price&#39; || filterData === &#39;price&#39;}">
                                    价格
                                    <i class="icon-uniE02D" ng-hide="filterData === &#39;price&#39;">
                                    </i>
                                    <i class="icon-uniE02C ng-hide" ng-show="filterData === &#39;price&#39;">
                                    </i>
                                </a>
                                <span>
                                    <a class="shopnav-filter-display icon-grid active" href="javascript:"
                                       title="以网格形式显示菜单" ng-click="changeDisplayType(&#39;grid&#39;)" ng-class="{active: displayType === &#39;grid&#39;}">
                                    </a>
                                    <a class="shopnav-filter-display icon-list" href="javascript:" title="以列表形式显示菜单"
                                       ng-click="changeDisplayType(&#39;list&#39;)" ng-class="{active: displayType === &#39;list&#39;}">
                                    </a>
                                </span>
                            </span>
                    <!-- end ngIf: shopAction===' menu' -->
                </div>
                <div class="shopnav-search">
                    <form class="place-search ng-pristine ng-valid" role="search" action="/shop/17" method="get">
                        <button class="place-search-btn icon-search" ubt-click="403" ng-attr-ubt-data-keyword=""
                                title="搜索商家或美食" ubt-data-keyword="">
                        </button>
                        <label for="globalsearch">
                            搜索商家或美食
                        </label>
                        <input id="globalsearch" class="place-search-input ng-pristine ng-valid"
                               ng-model="searchText" autocomplete="" placeholder="搜索商家,美食...">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="shopmain clearfix container ng-scope">
        <!-- ngIf: shopAction===' menu' -->
        <div ng-if="shopAction === &#39;menu&#39;" shop-menu="" shop-cache="shopCache"
             filter-data="shop.filter" display-type="shop.displayType" class="shopmenu ng-isolate-scope"
             perf-click="desktop/201">
            <div class="loading ng-binding ng-isolate-scope ng-hide" loading="" ng-show="loading">
                <!-- ngIf: type==='profile' -->
                <img ng-if="type===&#39;profile&#39;" src="/home/elm/profile-loading.4984fa.gif"
                     alt="正在加载" class="ng-scope">
                <!-- end ngIf: type==='profile' -->
                <!-- ngIf: type==='normal' -->
                正在载入数据...
            </div>
            <div class="shopmenu-nav ng-isolate-scope " id="gcate" >
                @foreach($gcate as $v)
                <a href="/shop/{{ $shopinfo->id }}#cat{{ $v->id }}"  class="ng-binding ng-scope ">
                    {{ $v->category }}
                </a>
               @endforeach
            </div>

            <div ng-show="!loading" class="shopmenu-main grid"  id="cgoods" ng-class="{grid: displayType === &#39;grid&#39;, list: displayType === &#39;list&#39;}" >
                <!-- ngIf: filterData===' default' && !searchEnv -->
                <script>

                    $(window).scroll(function () {

                        // console.log(top);
                        // console.log($(document).scrollTop());
                        dong();

                    });
                   document.onscroll= function (){

                        if ($(document).scrollTop() < 269) {
                            $('#cgoods').removeAttr('style');
                            $("#gcate").removeClass("sticky");
                        } else {
                            $("#gcate").addClass("sticky");
                            $('#cgoods').attr('style','margin-top:120px');
                        }
                    }
                </script>
                <div ng-if="filterData === &#39;default&#39; &amp;&amp; !searchEnv" class="ng-scope">
                    <!-- ngRepeat: category in categorys -->
                    @foreach($gcate as $v)
                    <div class="shopmenu-list clearfix ng-scope" ng-repeat="category in categorys">
                        <a id="cat{{ $v->id }}"><h3 class="shopmenu-title ng-binding">
                            {{ $v->category }}
                            <span class="shopmenu-des ng-binding">
                                        {{ $v->gcontent }}
                                    </span>
                        </h3></a>
                        <!-- ngRepeat: food in category.foods -->
                        @foreach($v->goods as $vv)
                        <div class="shopmenu-food ng-isolate-scope" ng-class="{noimg: !food.image_path}"
                             id="626104394"  shop-menu-item="" food="food"
                             shop="shopCache">
                            <!-- ngIf: food.image_path -->
                            <span class="col-1 ng-scope" ng-if="food.image_path">
                                        <a href="javascript:" onclick="ginfo('{{ $vv->id }}')" >
                                            <img  alt="{{ $vv->gname }}的图片" src="/uploads/{{ $vv->gpic }}">
                                        </a>
                                    </span>
                            <!-- end ngIf: food.image_path -->
                            <div class="col-2 shopmenu-food-main">

                                <h3 class="shopmenu-food-name ui-ellipsis ng-binding">
                                    {{ $vv->gname }}
                                </h3>
                                <p class="color-mute ui-ellipsis ng-binding" >
                                    {{ $vv->gdesc }}
                                </p>

                                <p>
                                <div class="starrating icon-star ng-isolate-scope" title="评分4.2分" rate-star=""
                                     rating="food.rating">
                                                <span class="icon-star" ng-style="{ width: (rating * 20) + &#39;%&#39; }"
                                                      style="width: 84.8%;">
                                                </span>
                                </div>
                                <span class="color-mute ng-binding">
                                                (29)
                                            </span>
                                <span class="color-mute ng-binding">
                                                月售{{ $vv->salecnt }}份
                                            </span>
                                </p>
                            </div>
                            <div>
                            <span class="col-3 shopmenu-food-price color-stress ng-binding"  >

                                        <small class="ng-binding color-stress">{{ $vv -> price }}
                                        </small>
                                    </span></div>
                            <span class="col-4">
                                        <div shop-cartbutton="" food="food" ng-hide="shop.id == &#39;656683&#39;"
                                             class="ng-isolate-scope">
                                            <!-- ngIf: !menuFood.hasSpec -->
                                            <div ng-if="!menuFood.hasSpec" class="ng-scope">
                                                <!-- ngIf: !cartItem.quantity && menuFood.stock -->
                                                <button class="shop-cartbutton ng-binding ng-scope" onclick="addcart(this,'{{ $vv->id }}')" gid="{{ $vv->id }}">
                                                    加入购物车
                                                </button>
                                                <!-- end ngIf: !cartItem.quantity && menuFood.stock -->
                                                <!-- ngIf: !menuFood.stock -->
                                                <!-- ngIf: cartItem.quantity> 0 || cartItem.quantity === '' -->
                                            </div>
                                            <!-- end ngIf: !menuFood.hasSpec -->
                                            <!-- ngIf: menuFood.hasSpec -->
                                        </div>
                                    </span>
                        </div>
                        @endforeach
                        <!-- end ngRepeat: food in category.foods -->
                    </div>
                    @endforeach
                </div>
                <script>
                    function addcart(obj){
                        var id = $(obj).attr('gid');
                        $.get('/home/addcart',{"id":id},function(data){
                            // console.log(data);
                            // console.log($('#firstd'));
                            if(data.status== 1){
                                var dcss = $('#shopbasket').css('top');
                                // console.log(dcss);
                                var topp = parseInt(dcss)-45;
                                // console.log(topp);
                                $('#shopbasket').css('top',topp);
                                // console.log(data.goods.gname);
                                var divs = $('<div id="pcart"></div>');
                                divs.addClass("shop-cartbasket-tablerow ng-scope");
                                // divs.text('1');
                                var str = '<div class="cell itemname ng-binding"  title="'+data.goods.gname+'">'+data.goods.gname+'</div> <div class="cell itemquantity"style="width: 90px"> <button onclick="delgcart(this, '+data.goods.id+')">-</button> <input  class="ng-pristine ng-valid" value="'+data.goods.bnt+'"> <button onclick="addgcart(this, '+data.goods.id+')">+</button> </div> <div class="cell itemtotal ng-binding" >'+data.goods.price+'</div>'
                                divs.html(str);

                                // console.log(divs);
                                divs.insertBefore($('#lastd'));
                             }
                        })

                    }

                    function delgcart(obj,id){
                        var inval = $(obj).next().val();
                        // console.log(inval);
                        var pval = $(obj).parent().next().text();
                        // console.log(pval);
                        $.get('/home/delgcart',{'id': id},function(data){
                            // console.log(data);
                            if (data == 1){
                                if (inval <=1){

                                    $(obj).parents('#pcart').remove();
                                    var dcss = $('#shopbasket').css('top');
                                    // console.log(dcss);
                                    var topp = parseInt(dcss)+45;
                                    $('#shopbasket').css('top',topp);
                                }else{
                                    var n = parseInt(inval)-1;
                                    $(obj).next().val(n);
                                    var m = n*(parseInt(pval)/parseInt(inval));
                                    $(obj).parent().next().text(m);
                                }
                            }

                        })

                    }
                    function addgcart(obj,id){
                        var inval = $(obj).prev().val();
                        var pval = $(obj).parent().next().text();
                        // console.log(inval);
                        $.get('/home/addgcart',{'id':id},function(data){
                            // console.log(data);
                            if (data == 1){
                                var n = parseInt(inval)+1;
                                $(obj).prev().val(n);
                                var m = n*(parseInt(pval)/parseInt(inval));
                                $(obj).parent().next().text(m);

                            }

                        })
                    }
                    function ginfo(id) {
                        $.get('/home/show',{'id':id},function (data) {
                            // console.log(data);
                             $('#ginpic').attr('src','/uploads/'+data.gpic);
                             $('#addcart').attr('gid',data.id);
                            $('#ginfoname').text(data.gname);
                            $('#gindesc').text(data.gdesc);
                            $('#ginprice').text(data.price);
                            $('#backg').css('display','block');
                            $('#ginfo').css('display','block');
                            // console.log($('#backg'));
                            // console.log( $('#ginfo'));
                        })
                    }
                    function xiaoshi(){
                        $('#backg').css('display','none');
                        $('#ginfo').css('display','none');
                    }

                </script>
                <!-- end ngIf: filterData===' default' && !searchEnv -->
                <!-- ngIf: filterData !==' default' || searchEnv -->
                <div shop-cart="" cart-link="cartLink" ng-hide="shopCache.id == 656683"
                     class="ng-isolate-scope">
                    <div class="shop-cart">
                        <div class="shop-cartbasket" id="shopbasket" style="top: -{{ ($gcarts = session()->get('gcarts')) ? 44 + count($gcarts)*45 : 44}}px; height: auto;">
                            <div shop-groupswitcher="" id="firstd" cart="shopCart" class="ng-isolate-scope">
                                <!-- ngIf: shopCart.vm.groups.length> 1 -->
                                <div class="shop-grouphead single" ng-class="{ single: shopCart.vm.groups.length === 1 }">
                                    <!-- ngIf: shopCart.vm.groups.length===1 -->
                                    <a href="javascript:" class="icon-cart-add ng-scope" ng-if="shopCart.vm.groups.length === 1"
                                       ng-click="addGroup()" tooltip="添加购物车">
                                    </a>
                                    <!-- end ngIf: shopCart.vm.groups.length===1 -->
                                    <!-- ngIf: showGuide && shopCart.vm.groups.length===1 -->
                                    <div class="shop-grouphead-row">
                                        <!-- ngIf: shopCart.vm.groups.length> 1 -->
                                        购物车
                                        <a href="javascript:" ng-click="shopCart.clearGroup(shopCart.currentGroupIndex)">
                                            [清空]
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @if($gcarts = session()->get('gcarts'))
                            @foreach( $gcarts as $v)
                            <div  class="shop-cartbasket-tablerow ng-scope" id="pcart">
                                <div class="cell itemname ng-binding"  title="{{ $v->gname }}">{{ $v->gname }}</div>
                                <div class="cell itemquantity"style="width: 90px">
                                    <button  onclick="delgcart(this,'{{ $v->id }}')">-</button>
                                    <input  class="ng-pristine ng-valid" value="{{ $v->bnt }}">
                                    <button onclick="addgcart(this,'{{ $v->id }}')">+</button>
                                </div>
                                <div class="cell itemtotal ng-binding" > {{$v->bnt*$v->price }}</div>
                            </div>
                            @endforeach
                            @endif

                            <!-- ngIf: !shopCart.vm.groups[shopCart.currentGroupIndex].length -->
                            <div class="shop-cartbasket-empty ng-scope" id="lastd" ng-if="!shopCart.vm.groups[shopCart.currentGroupIndex].length">
                                <div class="icon-cart">
                                </div>
                                <p>
                                    购物车是空的，赶紧选购吧
                                </p>
                            </div>
                            <!-- end ngIf: !shopCart.vm.groups[shopCart.currentGroupIndex].length
                            -->
                            <!-- ngRepeat: item in shopCart.vm.groups[shopCart.currentGroupIndex]
                            -->
                            <!-- ngIf: shopCart.packingFee -->
                        </div>
                        <div class="shop-cartfooter" ng-click="shopCart.toggleCart()">
                                    <span class="icon-cart shop-carticon">
                                        <!-- ngIf: shopCart.vm.quantity> 0 -->
                                    </span>
                            <!-- ngIf: shopCart.vm.quantity> 0 -->
                            <!-- ngIf: shopCart.vm.extras.length && !shopCart.vm.button.disabled -->
                            <div class="shop-cartfooter-text extras ng-binding" ng-bind-html="shopCart.vm.picewiseText">
                                配送费¥{{ $shopinfo ->sendmoney }}
                            </div>
                            <a href="/shop/{{ $shopinfo->id }}/jiesuan"> <button class="shop-cartfooter-checkout ng-binding " >
                                    去结算
                            </button></a>
                        </div>
                        <div class="shop-carthelper-opener" ng-class="{show: shopCart.cartHelper.show}"
                             ng-click="showCartHelper()">
                        </div>
                        <div class="shop-carthelper ng-isolate-scope" id="shophelper" shop-cart-helper=""
                             group="shopCart.cartHelper.group" cart="shopCart">
                            <div class="shopcarhelper-title clearfix">
                                        <span>
                                            凑一凑
                                        </span>
                                <em>
                                    轻松凑满起送价
                                </em>
                                <a href="javascript:" ng-click="closeCartHelper()">
                                    [ 关闭 ]
                                </a>
                            </div>
                            <div class="shopcarthelper-container ui-scrollbar-light">
                                <!-- ngRepeat: item in group track by $index -->
                            </div>
                        </div>
                        <div class="shop-flyitem">
                        </div>
                    </div>
                </div>
                <div class="dialog" role="dialog" dialog="ITEMINFO" style="display: none;">
                    <div class="dialog-close icon-close">
                    </div>
                    <div class="dialog-content" ng-transclude="">
                        <div shop-iteminfo="" item-info="itemInfo" class="ng-scope ng-isolate-scope">
                            <div class="shop-iteminfo">
                                <div class="iteminfo-imagegroup">
                                    <img class="mainimage" ng-src="" alt="的图片">
                                    <div ng-show="imagesPath.length &gt; 1" class="ng-hide">
                                        <a href="javascript:" ng-click="showImageNext(-4)" class="imagegroup-ctrl icon-profile-left-arrow">
                                        </a>
                                        <ul class="imagelist">
                                            <!-- ngRepeat: imagePath in imagesPath track by $index -->
                                        </ul>
                                        <a href="javascript:" ng-click="showImageNext(4)" class="imagegroup-ctrl icon-profile-right-arrow">
                                        </a>
                                    </div>
                                </div>
                                <section class="iteminfo-info">
                                    <h5 ng-bind="itemInfo.name" class="ng-binding">
                                    </h5>
                                    <p ng-show="!!itemInfo.description" class="description ng-binding ng-hide"
                                       ng-bind="itemInfo.description">
                                    </p>
                                    <div class="iteminfo-cartitem">
                                        <div class="iteminfo-price">
                                                    <span class="price">
                                                        <span class="yen">
                                                            ¥
                                                        </span>
                                                        <span class="price ng-binding">
                                                        </span>
                                                    </span>
                                        </div>
                                        <!-- ngIf: itemInfo.name -->
                                    </div>
                                    <div class="iteminfo-rate">
                                        <!-- ngIf: ratingCount -->
                                        <ul class="rategroup">
                                            <!-- ngRepeat: item in ratePageContext.pageData -->
                                        </ul>
                                        <div pagination="" pagination-context="ratePageContext" pagination-pagesize="3"
                                             class=" pagination">
                                            <ul>
                                            </ul>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="shopmain-right ng-isolate-scope" shop-bulletin="" data="shop">
            <div class="shopbulletin">
                <div class="shopbulletin-section">
                    <h3 class="shopbulletin-section-title">
                        商家公告
                    </h3>
                    <p class="shopbulletin-content ng-binding">
                        {{ $shopinfo->content }}
                    </p>
                    <div class="shopbulletin-delivery">
                        <h4>
                            配送说明：
                        </h4>
                        <p class="ng-binding">
                            配送费¥5
                        </p>
                    </div>
                    <ul class="shopbulletin-supports">
                        <!-- ngRepeat: support in shop.supports -->
                        <li ng-repeat="support in shop.supports" class="ng-binding ng-scope">
                                    <span ng-style="{&#39;background-color&#39;: &#39;#&#39; + support.icon_color}"
                                          class="ng-binding" style="background-color: rgb(153, 153, 153);">
                                        票
                                    </span>
                            该商家支持开发票，开票订单金额10.0元起，请在下单时填写好发票抬头
                        </li>
                        <!-- end ngRepeat: support in shop.supports -->
                    </ul>
                    <a href="javascript:" class="shopcomplaint" ng-click="testLogin()">
                        举报商家
                    </a>
                </div>
                <div class="dialog" role="dialog" dialog="complaintDialog" style="display: none;">
                    <div class="dialog-close icon-close">
                    </div>
                    <div class="dialog-content" ng-transclude="">
                        <h5 class="complaint-title ng-scope">
                            举报商家
                        </h5>
                        <form ng-submit="complaint()" class="ng-scope ng-pristine ng-valid">
                            <label class="complaint-field">
                                        <textarea class="shopcomplaint-textarea ng-pristine ng-valid" ng-model="complaintObj.text"
                                                  rows="6" cols="40">
                                        </textarea>
                            </label>
                            <div class="complaint-field">
                                <button type="submit" class="btn-primary">
                                    提交
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidetools" side-tools="">
        <a href="http://kaidian.ele.me/" class="sidetools-item icon-visit-history"
           target="_blank" title="我要开店" tooltip="我要开店" tooltip-placement="left">
        </a>
        <div class="sidetools-item icon-qrcode">
            <img class="sidetools-qrcode" src="/home/elm/appqc.95e532.png" alt="扫描二维码免费下载手机App">
        </div>
        <a href="JavaScript:" class="sidetools-item icon-service" title="在线客服"
           tooltip="在线客服" tooltip-placement="left" online-service="" target="_blank"
           style="visibility: visible;">
        </a>
        <a href="JavaScript:" class="sidetools-item icon-arrow-up" title="回到顶部"
           tooltip="回到顶部" tooltip-placement="left" ng-click="backToTop()">
        </a>
    </div>
</div>
<div id="backg" style="position: fixed; left: 0px; top: 0px; width: 100%; height: 100%; opacity: 0.5; background: rgb(0, 0, 0); z-index: 1018; display: none;"></div>
<div class="dialog" role="dialog" id="ginfo" dialog="ITEMINFO" style="z-index: 1019; left: 213px; top: 100px;  display: none;">
    <div onclick="xiaoshi()" class="dialog-close icon-close"></div>
    <div class="dialog-content" ng-transclude="">
        <div shop-iteminfo="" item-info="itemInfo" class="ng-scope ng-isolate-scope">
            <div class="shop-iteminfo"><div class="iteminfo-imagegroup">
                    <img class="mainimage" id="ginpic" alt="" src="">
                    <div ng-show="imagesPath.length > 1" class="ng-hide">
                        <a href="javascript:" ng-click="showImageNext(-4)" class="imagegroup-ctrl icon-profile-left-arrow"></a>
                        <ul class="imagelist">
                            <!-- ngRepeat: imagePath in imagesPath track by $index -->
                            <li ng-repeat="imagePath in imagesPath track by $index" ng-show="$index >= showImageOffset" class="ng-scope">
                                <a href="javascript:" ng-click="focusImage($index)" ng-class="{ focus: currentImage === $index }" class="focus">
                                    <img  alt="" src="">
                                </a>
                            </li><!-- end ngRepeat: imagePath in imagesPath track by $index -->
                        </ul>
                        <a href="javascript:" ng-click="showImageNext(4)" class="imagegroup-ctrl icon-profile-right-arrow">

                        </a>
                    </div>
                </div>
                <section class="iteminfo-info">
                        <h5 ng-bind="itemInfo.name" id="ginfoname" class="ng-binding"></h5>
                    <p ng-show="!!itemInfo.description" id="gindesc" class="description ng-binding" ng-bind="itemInfo.description"></p>
                    <div class="iteminfo-cartitem">
                        <div class="iteminfo-price">
                            <span class="price">
                                <span class="yen">¥</span>
                                <span id="ginprice" class="price ng-binding" >50</span>
                            </span>
                        </div>
                        <!-- ngIf: itemInfo.name -->
                        <div ng-if="itemInfo.name" shop-cartbutton="" food="itemInfo" button-text="立即购买"  class="ng-scope ng-isolate-scope">
                            <!-- ngIf: !menuFood.hasSpec -->
                            <div ng-if="!menuFood.hasSpec" class="ng-scope">
                                <!-- ngIf: !cartItem.quantity && menuFood.stock -->
                                <!-- ngIf: !menuFood.stock --><!-- ngIf: cartItem.quantity >
                                 0 || cartItem.quantity === '' -->
                                {{--<div class="shop-cartctrl ng-scope" ng-if="cartItem.quantity > 0 || cartItem.quantity === ''">--}}
                                {{--<button class="ctrl minus" ng-click="cartItem.sub($event)">-</button>--}}
                                {{--<input class="ctrl quantity ng-pristine ng-valid" min="1" ng-model="cartItem.quantity" ng-change="cartItem.update(cartItem.quantity)">--}}
                                {{--<button class="ctrl plus" ng-click="cartItem.add($event)">+</button>--}}
                                {{--</div>--}}
                                <button class="shop-cartbutton ng-binding ng-scope" id="addcart" onclick="addcart(this,id)" gid="" >立即购买</button>
                                <!-- end ngIf: cartItem.quantity > 0 || cartItem.quantity === '' -->
                            </div><!-- end ngIf: !menuFood.hasSpec --><!-- ngIf: menuFood.hasSpec -->
                        </div><!-- end ngIf: itemInfo.name -->
                    </div>
                    <div class="iteminfo-rate"><!-- ngIf: ratingCount -->
                        <ul class="rategroup"><!-- ngRepeat: item in ratePageContext.pageData -->
                        </ul>
                        <div pagination="" pagination-context="ratePageContext" pagination-pagesize="3" class=" pagination">
                            <ul></ul>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<footer class="footer" role="contentinfo">
    <div class="container clearfix">
        <div class="footer-link">
            <h3 class="footer-link-title">
                用户帮助
            </h3>
            <a class="footer-link-item" href="https://www.ele.me/support/center" target="_blank">
                服务中心
            </a>
            <a class="footer-link-item" href="https://www.ele.me/support/question/default"
               target="_blank">
                常见问题
            </a>
            <a class="footer-link-item" online-service="" href="javascript:" style="visibility: visible;">
                在线客服
            </a>
        </div>
        <div class="footer-link">
            <h3 class="footer-link-title">
                商务合作
            </h3>
            <a class="footer-link-item" href="https://kaidian.ele.me/" target="_blank">
                我要开店
            </a>
            <a class="footer-link-item" href="https://www.ele.me/support/about/jiameng"
               target="_blank">
                加盟指南
            </a>
            <a class="footer-link-item" href="https://www.ele.me/support/about/contact"
               target="_blank">
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
            <a class="footer-link-item" href="https://www.ele.me/support/about" target="_blank">
                饿了么介绍
            </a>
            <a class="footer-link-item" href="http://jobs.ele.me/" target="_blank">
                加入我们
            </a>
            <a class="footer-link-item" href="https://www.ele.me/support/about/contact"
               target="_blank">
                联系我们
            </a>
            <a class="footer-link-item" href="https://www.ele.me/support/rules/default"
               target="_blank">
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
                <div href="JavaScript:" class="icon-wechat" ubt-click="402">
                    <div class="dropbox dropbox-bottom footer-contect-dropbox" ubt-visit="402">
                        <img src="/home/elm/wexinqc100@2x.393ade.png" alt="微信号: elemeorder">
                        <p>
                            微信号: elemeorder
                        </p>
                        <p>
                            饿了么网上订餐
                        </p>
                    </div>
                </div>
                <a href="http://e.weibo.com/elemeorder" class="icon-weibo" target="_blank">
                </a>
            </div>
        </div>
        <div class="footer-mobile">
            <a href="https://h.ele.me/landing" target="_blank">
                <img src="/home/elm/appqc.95e532.png" class="footer-mobile-icon" alt="扫一扫下载饿了么手机 App">
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
                <a href="http://www.sgs.gov.cn/lz/licenseLink.do?method=licenceView&amp;entyId=20120305173227823"
                   target="_blank">
                    上海工商行政管理
                </a>
                Copyright ©2008-2017 ele.me, All Rights Reserved.
            </p>
        </div>
        <div class="footer-police container">
            <a href="http://www.zx110.org/picp/?sn=310100103568" rel="nofollow" target="_blank">
                <img alt="已通过沪公网备案，备案号 310100103568" src="/home/elm/picp_bg.e373b3.jpg" height="30">
            </a>
        </div>
    </div>
</footer>

<script src="/home/elm/home">
</script>
<script src="/home/js/textStatic.js">
</script>
<script src="/home/js/textStatic.js">
</script>
<script src="/home/js/textStatic.js">
</script>
</body>

</html>