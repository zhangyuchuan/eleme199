@extends('homes.layout')

@section('title','饿了么-网上订餐_外卖_饿了么订餐官网')

@section('content')
    <link href="/home/css/vendor.eb86f5.css" rel="stylesheet">
    <link href="/home/css/profile.4b02a0.css" rel="stylesheet">

<div ng-view="" role="main" class="ng-scope">
    <div class="profile-container container" profile-container="" page-name="security-center"
         page-title="安全中心">
        <div class="clearfix">
            <div class="location" ng-style="{visibility: geohash ? &#39;&#39; : &#39;hidden&#39;}"
                 role="navigation" location="">
                        <span>
                            当前位置:
                        </span>
                <span class="location-current">
                            <a class="inherit ng-binding" ng-href="/place/wx4spk2hgfer" ubt-click="401"
                               ng-bind="place.name || place.address" href="https://www.ele.me/place/wx4spk2hgfer">
                                昌平区204县道(北京市育荣教育园区西)
                            </a>
                        </span>
                <span class="location-change location-hashistory" ng-class="{ &#39;location-hashistory&#39;: user.username &amp;&amp; userPlaces &amp;&amp; userPlaces.length &gt; 0 }">
                            <a ng-href="/home" ubt-click="400" hardjump="" href="https://www.ele.me/home">
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
                                       ng-bind="userPlace.name" ubt-click="399" href="https://www.ele.me/place/wx4spk2jk0db?latitude=40.102375&amp;longitude=116.334404">
                                        昌平区204县道(北京市育荣教育园区西)
                                    </a>
                                </li>
                                <!-- end ngRepeat: userPlace in userPlaces | filter:filterPlace | limitTo:
                                4 -->
                                <li class="changelocation">
                                    <a ng-href="/home" hardjump="" href="https://www.ele.me/home">
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
                                安全中心
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
                    <li ng-class="{ active: pageName === &#39;order&#39; }">
                        <a href="https://www.ele.me/profile/order">
                            近三个月订单
                        </a>
                    </li>
                    <li ng-class="{ active: pageName === &#39;order-unrated&#39; }">
                        <a href="https://www.ele.me/profile/order/unrated">
                            待评价订单
                            <!-- ngIf: unratedNumber -->
                        </a>
                    </li>
                    <li ng-class="{ active: pageName === &#39;order-refunding&#39; }">
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
                    <li ng-class="{ active: pageName === &#39;hongbao&#39; }">
                        <a href="https://www.ele.me/profile/hongbao">
                            我的红包
                        </a>
                    </li>
                    <li ng-class="{ active: pageName === &#39;balance&#39; }">
                        <a href="https://www.ele.me/profile/balance">
                            账户余额
                        </a>
                    </li>
                    <li ng-class="{ active: pageName === &#39;points&#39; }">
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
                    <li ng-class="{ active: pageName === &#39;info&#39; }">
                        <a href="https://www.ele.me/profile/info">
                            个人资料
                        </a>
                    </li>
                    <li ng-class="{ active: pageName === &#39;address&#39; }">
                        <a href="https://www.ele.me/profile/address">
                            地址管理
                        </a>
                    </li>
                    <li ng-class="{ active: pageName === &#39;security-center&#39; }" class="active">
                        <a href="https://www.ele.me/profile/security">
                            安全中心
                        </a>
                    </li>
                    <li ng-class="{ active: pageName === &#39;changepassword&#39; }">
                        <a href="https://www.ele.me/profile/security/changepassword">
                            修改密码
                        </a>
                    </li>
                </ul>
            </li>
            <li class="profile-sidebar-section">
                <h2 class="profile-sidebar-sectiontitle" ng-class="{ active: pageName === &#39;favor&#39; }">
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
            <h3 ng-if="pageTitleVisible" class="profile-paneltitle ng-scope">
                        <span ng-bind="pageTitle" class="ng-binding">
                            安全中心
                        </span>
                <span class="subtitle ng-binding" ng-bind-html="pageSubtitle | toTrusted">
                        </span>
            </h3>
            <!-- end ngIf: pageTitleVisible -->
            <div class="profile-panelcontent" ng-transclude="">
                <div class="security-level ng-scope">
                            <span>
                                安全等级：
                            </span>
                    <div class="security-level-bar">
                                <span class="security-level-progress low" ng-style="{&#39;width&#39;: level.width, &#39;background-color&#39;: level.color}"
                                      style="width: 60%; background-color: rgb(148, 200, 82);">
                                </span>
                    </div>
                    <span class="security-level-text ng-binding" ng-bind="level.text" ng-style="{&#39;color&#39;: level.color}"
                          style="color: rgb(148, 200, 82);">
                                高
                            </span>
                    <span class="security-level-tip">
                                建议你启动全部安全设置，以保障账户及资金安全！
                            </span>
                </div>
                <div class="loading ng-binding ng-isolate-scope ng-hide" loading="" content="正在载入安全信息..."
                     ng-show="securityLoading">
                    <!-- ngIf: type==='profile' -->
                    <img ng-if="type===&#39;profile&#39;" src="./个人中心_安全中心 _ 饿了么网上订餐_files/profile-loading.4984fa.gif"
                         alt="正在加载" class="ng-scope">
                    <!-- end ngIf: type==='profile' -->
                    <!-- ngIf: type==='normal' -->
                    正在载入安全信息...
                </div>
                <!-- ngRepeat: item in securityType -->
                <div class="security-type ng-scope" ng-repeat="item in securityType">
                            <span class="child security-type-icon">
                                <i ng-class="item.status ? &#39;security-type-icon-ok icon-dot-check&#39; : &#39;security-type-icon-warn icon-dot-warning&#39;"
                                   class="security-type-icon-warn icon-dot-warning">
                                </i>
                            </span>
                    <span class="child security-type-name ng-binding security-type-name-weak"
                          ng-class="item.status || &#39;security-type-name-weak&#39;" ng-bind="item.name">
                                登录密码
                            </span>
                    <div class="child security-type-tip">
                        <p ng-bind="item.text.text" class="ng-binding">
                            您还没有设置密码
                        </p>
                        <!-- ngIf: item.text.textMore -->
                        <p class="security-type-tip-more ng-binding ng-scope" ng-if="item.text.textMore"
                           ng-bind-html="item.text.textMore | toTrusted">
                            设置登陆密码，使用饿了么更方便、安全。
                        </p>
                        <!-- end ngIf: item.text.textMore -->
                    </div>
                    <span class="child security-type-linkcon">
                                <a class="security-type-link ng-binding btn-stress" target="" ng-href="/profile/security/changepassword"
                                   ng-class="item.status ? &#39;btn-link&#39; : &#39;btn-stress&#39;" ng-bind="item.text.link"
                                   href="https://www.ele.me/profile/security/changepassword">
                                    设置密码
                                </a>
                            </span>
                </div>
                <!-- end ngRepeat: item in securityType -->
                <div class="security-type ng-scope" ng-repeat="item in securityType">
                            <span class="child security-type-icon">
                                <i ng-class="item.status ? &#39;security-type-icon-ok icon-dot-check&#39; : &#39;security-type-icon-warn icon-dot-warning&#39;"
                                   class="security-type-icon-ok icon-dot-check">
                                </i>
                            </span>
                    <span class="child security-type-name ng-binding" ng-class="item.status || &#39;security-type-name-weak&#39;"
                          ng-bind="item.name">
                                手机验证
                            </span>
                    <div class="child security-type-tip">
                        <p ng-bind="item.text.text" class="ng-binding">
                            已绑定手机 151****2553
                        </p>
                        <!-- ngIf: item.text.textMore -->
                    </div>
                    <span class="child security-type-linkcon">
                                <a class="security-type-link ng-binding btn-link" target="" ng-href="/profile/security/changemobile/"
                                   ng-class="item.status ? &#39;btn-link&#39; : &#39;btn-stress&#39;" ng-bind="item.text.link"
                                   href="https://www.ele.me/profile/security/changemobile/">
                                    更改手机
                                </a>
                            </span>
                </div>
                <!-- end ngRepeat: item in securityType -->
                <div class="security-type ng-scope" ng-repeat="item in securityType">
                            <span class="child security-type-icon">
                                <i ng-class="item.status ? &#39;security-type-icon-ok icon-dot-check&#39; : &#39;security-type-icon-warn icon-dot-warning&#39;"
                                   class="security-type-icon-warn icon-dot-warning">
                                </i>
                            </span>
                    <span class="child security-type-name ng-binding security-type-name-weak"
                          ng-class="item.status || &#39;security-type-name-weak&#39;" ng-bind="item.name">
                                邮箱激活
                            </span>
                    <div class="child security-type-tip">
                        <p ng-bind="item.text.text" class="ng-binding">
                            您还没有绑定邮箱
                        </p>
                        <!-- ngIf: item.text.textMore -->
                        <p class="security-type-tip-more ng-binding ng-scope" ng-if="item.text.textMore"
                           ng-bind-html="item.text.textMore | toTrusted">
                            验证后可用户快速找回密码，接受账户提醒邮件。
                        </p>
                        <!-- end ngIf: item.text.textMore -->
                    </div>
                    <span class="child security-type-linkcon">
                                <a class="security-type-link ng-binding btn-stress" target="" ng-href="/profile/security/bindemail"
                                   ng-class="item.status ? &#39;btn-link&#39; : &#39;btn-stress&#39;" ng-bind="item.text.link"
                                   href="https://www.ele.me/profile/security/bindemail">
                                    立即绑定
                                </a>
                            </span>
                </div>
                <!-- end ngRepeat: item in securityType -->
                <div class="security-type ng-scope" ng-repeat="item in securityType">
                            <span class="child security-type-icon">
                                <i ng-class="item.status ? &#39;security-type-icon-ok icon-dot-check&#39; : &#39;security-type-icon-warn icon-dot-warning&#39;"
                                   class="security-type-icon-ok icon-dot-check">
                                </i>
                            </span>
                    <span class="child security-type-name ng-binding" ng-class="item.status || &#39;security-type-name-weak&#39;"
                          ng-bind="item.name">
                                支付额度
                            </span>
                    <div class="child security-type-tip">
                        <p ng-bind="item.text.text" class="ng-binding">
                            已设定支付额 50 元
                        </p>
                        <!-- ngIf: item.text.textMore -->
                        <p class="security-type-tip-more ng-binding ng-scope" ng-if="item.text.textMore"
                           ng-bind-html="item.text.textMore | toTrusted">
                            如果当日在线订餐金额超出支付额度，手机验证后才可以付款。
                        </p>
                        <!-- end ngIf: item.text.textMore -->
                    </div>
                    <span class="child security-type-linkcon">
                                <a class="security-type-link ng-binding btn-link" target="" ng-href="/profile/security/modifypay"
                                   ng-class="item.status ? &#39;btn-link&#39; : &#39;btn-stress&#39;" ng-bind="item.text.link"
                                   href="https://www.ele.me/profile/security/modifypay">
                                    更改额度
                                </a>
                            </span>
                </div>
                <!-- end ngRepeat: item in securityType -->
            </div>
        </div>
    </div>
</div>
@endsection
