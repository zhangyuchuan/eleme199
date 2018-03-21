@extends('homes.layout')

@section('title','饿了么-网上订餐_外卖_饿了么订餐官网')

@section('content')

    <link href="/home/css/vendor.eb86f5.css" rel="stylesheet">
    <link href="/home/css/profile.4b02a0.css" rel="stylesheet">
        <div class="sidebar" role="complementary" hide="layoutState &amp;&amp; layoutState.hideSidebar">
            <div class="sidebar-tabs">
                <div class="toolbar-tabs-middle">
                    <a class="toolbar-btn icon-order toolbar-close" href="https://www.ele.me/profile/order"
                    hardjump="" tooltip="我的订单" tooltip-placement="left" ubt-click="toolbar_order">
                        <!-- ngIf: sidebarCount.uncompletedOrder> 0 -->
                    </a>
                    <div class="toolbar-separator">
                    </div>
                    <a class="toolbar-cartbtn icon-cart toolbar-open" href="JavaScript:" template="cart"
                    class="{&#39;focus&#39;: (activeTemplate === &#39;cart&#39; &amp;&amp; isSidebarOpen), &#39;toolbar-cartbtn-shownum&#39;: foodCount.count}"
                    ubt-click="390">
                        购物车
                        <!-- ngIf: foodCount.count -->
                    </a>
                    <div class="toolbar-separator">
                    </div>
                    <a class="toolbar-btn icon-notice toolbar-open modal-hide" href="JavaScript:"
                    template="message" class="{&#39;focus&#39;: (activeTemplate === &#39;message&#39; &amp;&amp; isSidebarOpen), &#39;toolbar-open&#39;: user, &#39;modal-hide&#39;: user}"
                    tooltip="我的信息" tooltip-placement="left" ubt-click="392">
                        <!-- ngIf: messageCount.count -->
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
        <div view="" role="main" class="scope">
            <div class="profile-container container" profile-container="" page-name="order"
            page-title="近三个月订单">
                <div class="clearfix">
                    <div class="location" style="{visibility: geohash ? &#39;&#39; : &#39;hidden&#39;}"
                    role="navigation" location="">
                        <span>
                            当前位置:
                        </span>
                        <span class="location-current">
                            <a class="inherit binding" href="/place/wx4spk2hgfer" ubt-click="401"
                            bind="place.name || place.address" href="https://www.ele.me/place/wx4spk2hgfer">
                                昌平区204县道(北京市育荣教育园区西)
                            </a>
                        </span>
                        <span class="location-change location-hashistory" class="{ &#39;location-hashistory&#39;: user.username &amp;&amp; userPlaces &amp;&amp; userPlaces.length &gt; 0 }">
                            <a href="/home" ubt-click="400" hardjump="" href="https://www.ele.me/home">
                                [切换地址]
                            </a>
                            <ul class="dropbox location-dropbox" ubt-visit="398">
                                <li class="arrow">
                                </li>
                                <!-- ngRepeat: userPlace in userPlaces | filter:filterPlace | limitTo:
                                4 -->
                                <li repeat="userPlace in userPlaces | filter:filterPlace | limitTo: 4"
                                class="scope">
                                    <a class="inherit binding" href="/place/wx4spk2jk0db?latitude=40.102375&amp;longitude=116.334404"
                                    bind="userPlace.name" ubt-click="399" href="https://www.ele.me/place/wx4spk2jk0db?latitude=40.102375&amp;longitude=116.334404">
                                        昌平区204县道(北京市育荣教育园区西)
                                    </a>
                                </li>
                                <!-- end ngRepeat: userPlace in userPlaces | filter:filterPlace | limitTo:
                                4 -->
                                <li class="changelocation">
                                    <a href="/home" hardjump="" href="https://www.ele.me/home">
                                        修改收货地址
                                        <span class="icon-location">
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </span>
                        <span transclude="">
                            <i class="icon-arrow-right scope">
                            </i>
                            <span class="binding scope">
                                近三个月订单
                            </span>
                        </span>
                    </div>
                    <div search-input="">
                    </div>
                </div>
                <ul class="profile-sidebar" role="navigation" profile-sidebar="">
                    <li class="profile-sidebar-section">
                        <h2 class="profile-sidebar-sectiontitle" class="{ active: pageName === &#39;profile&#39; }">
                            <i class="icon-line-home">
                            </i>
                            <a href="https://www.ele.me/profile">
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
                            <li class="{ active: pageName === &#39;order&#39; }" class="active">
                                <a href="https://www.ele.me/profile/order">
                                    近三个月订单
                                </a>
                            </li>
                            <li class="{ active: pageName === &#39;order-unrated&#39; }">
                                <a href="https://www.ele.me/profile/order/unrated">
                                    待评价订单
                                    <!-- ngIf: unratedNumber -->
                                </a>
                            </li>
                            <li class="{ active: pageName === &#39;order-refunding&#39; }">
                                <a href="https://www.ele.me/profile/order/refund">
                                    退单记录
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
                            <li class="{ active: pageName === &#39;hongbao&#39; }">
                                <a href="https://www.ele.me/profile/hongbao">
                                    我的红包
                                </a>
                            </li>
                            <li class="{ active: pageName === &#39;balance&#39; }">
                                <a href="https://www.ele.me/profile/balance">
                                    账户余额
                                </a>
                            </li>
                            <li class="{ active: pageName === &#39;points&#39; }">
                                <a href="https://www.ele.me/profile/points">
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
                            <li class="{ active: pageName === &#39;info&#39; }">
                                <a href="https://www.ele.me/profile/info">
                                    个人资料
                                </a>
                            </li>
                            <li class="{ active: pageName === &#39;address&#39; }">
                                <a href="https://www.ele.me/profile/address">
                                    地址管理
                                </a>
                            </li>
                            <li class="{ active: pageName === &#39;security-center&#39; }">
                                <a href="https://www.ele.me/profile/security">
                                    安全中心
                                </a>
                            </li>
                            <li class="{ active: pageName === &#39;changepassword&#39; }">
                                <a href="https://www.ele.me/profile/security/changepassword">
                                    修改密码
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="profile-sidebar-section">
                        <h2 class="profile-sidebar-sectiontitle" class="{ active: pageName === &#39;favor&#39; }">
                            <a href="https://www.ele.me/profile/favor">
                                <i class="icon-order-favor">
                                </i>
                                我的收藏
                            </a>
                        </h2>
                    </li>
                </ul>
                <div class="profile-panel" role="main">
                    <!-- ngIf: pageTitleVisible -->
                    <h3 if="pageTitleVisible" class="profile-paneltitle scope">
                        <span bind="pageTitle" class="binding">
                            近三个月订单
                        </span>
                        <span class="subtitle binding" bind-html="pageSubtitle | toTrusted">
                        </span>
                    </h3>
                    <!-- end ngIf: pageTitleVisible -->
                    <div class="profile-panelcontent" transclude="">
                        <div class="order-fetchtakeout scope isolate-scope" show-fetch-takeout-dialog="">
                            <img src="/home/img/takeout.408a87.png">
                        </div>
                        <div class="order-extra scope">
                            <a href="https://www.ele.me/support/question/hotissue" target="_blank">
                                热门问题
                            </a>
                            <a href="https://static11.elemecdn.com/eleme/desktop/mobile/index.html"
                            target="_blank">
                                随时关注订单状态
                            </a>
                        </div>

                        <div class="order-nocontent nodata isolate-scope" show="orderList &amp;&amp; !orderList.length"
                        nodatatip="" content="暂无记录，现在就去&lt;a href=&#39;/place&#39;&gt;订餐&lt;/a&gt;吧!">
                            <p class="nodata-container binding" bind-html="content | toTrusted">
                                暂无记录，现在就去
                                <a href="https://www.ele.me/place">
                                    订餐
                                </a>
                                吧!
                            </p>
                        </div>
                        <table class="order-list scope hide" show="orderList.length">

                            <tbody>
                                <tr>
                                </tr>
                                <!-- ngRepeat: item in orderList -->
                            </tbody>
                        </table>
                        <div pagination="order" pagination-context="pageContext" pagination-onchange="onOrderPageChange()"
                        class="scope pagination">
                            <ul>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>



@endsection