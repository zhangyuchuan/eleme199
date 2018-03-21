@extends('homes.layout')

@section('title','饿了么-网上订餐_外卖_饿了么订餐官网')

@section('content')
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
                    <li ng-class="{ active: pageName === &#39;info&#39; }" class="active">
                        <a href="https://www.ele.me/profile/info">
                            个人资料
                        </a>
                    </li>
                    <li ng-class="{ active: pageName === &#39;address&#39; }">
                        <a href="https://www.ele.me/profile/address">
                            地址管理
                        </a>
                    </li>
                    <li ng-class="{ active: pageName === &#39;security-center&#39; }">
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
                            个人资料
                        </span>
                <span class="subtitle ng-binding" ng-bind-html="pageSubtitle | toTrusted">
                        </span>
            </h3>
            <!-- end ngIf: pageTitleVisible -->
            <div class="profile-panelcontent" ng-transclude="">
                <div class="profileinfo ng-scope">
                    <p class="profileinfo-item">
                                <span class="profileinfo-label">
                                    头像
                                </span>
                        <span class="profileinfo-face">
                                    <img ng-src="//fuss10.elemecdn.com/1/aa/517c48e40061040af3a2b6a96bf94jpeg.jpeg?imageMogr2/format/webp/quality/85"
                                         alt="seeklegend" src="./个人中心_个人资料 _ 饿了么网上订餐_files/517c48e40061040af3a2b6a96bf94jpeg(1).jpeg">
                                    <a class="profileinfo-facedit" href="https://www.ele.me/profile/changeavatar">
                                        编辑头像
                                    </a>
                                </span>
                    </p>
                    <p class="profileinfo-item">
                                <span class="profileinfo-label">
                                    用户名
                                </span>
                        <span>
                                    <span class="profileinfo-value ng-binding" ng-bind="user.username">
                                        seeklegend
                                    </span>
                            <!-- ngIf: user.is_auto_generated.username -->
                                </span>
                    </p>
                    <p class="profileinfo-item">
                                <span class="profileinfo-label">
                                    手机号码
                                </span>
                        <!-- ngIf: user.is_mobile_valid -->
                        <span ng-if="user.is_mobile_valid" class="ng-scope">
                                    <span class="profileinfo-value ng-binding" ng-bind="user.mobile">
                                        15139802553
                                    </span>
                                    <a class="profileinfo-link" href="https://www.ele.me/profile/security">
                                        [修改]
                                    </a>
                                </span>
                        <!-- end ngIf: user.is_mobile_valid -->
                        <!-- ngIf: !user.is_mobile_valid -->
                    </p>
                    <p class="profileinfo-item">
                                <span class="profileinfo-label">
                                    我的邮箱
                                </span>
                        <!-- ngIf: user.is_email_valid -->
                        <!-- ngIf: !user.is_email_valid -->
                        <span ng-if="!user.is_email_valid" class="ng-scope">
                                    <span class="profileinfo-value unbind">
                                        未绑定
                                    </span>
                                    <a class="profileinfo-link unbind" href="https://www.ele.me/profile/security">
                                        [立即绑定]
                                    </a>
                                </span>
                        <!-- end ngIf: !user.is_email_valid -->
                    </p>
                    <div class="dialog" role="dialog" dialog="username" style="display: none;">
                        <div class="dialog-close icon-close">
                        </div>
                        <div class="dialog-content" ng-transclude="">
                            <form class="modifyname ng-scope ng-pristine ng-valid" ng-submit="modifyUsername()">
                                <h3 class="modifyname-title">
                                    修改用户名
                                    <small>
                                        用户名只能修改一次
                                    </small>
                                </h3>
                                <div class="formfield ng-isolate-scope" ng-class="{ &#39;validate-error&#39;: model.$hintTypes[property] === &#39;error&#39; }"
                                     form-field="" model="userData" property="name">
                                    <label ng-bind="label" class="ng-binding">
                                    </label>
                                    <input ng-model="userData.name" placeholder="请输入新的用户名（5-24字符）" class="ng-scope ng-pristine ng-valid">
                                    <div class="formfield-hint">
                                                <span ng-class="{ &#39;icon-dot-error&#39;: model.$hintTypes[property] === &#39;error&#39;, &#39;icon-dot-warning&#39;: model.$hintTypes[property] === &#39;warning&#39; }"
                                                      ng-bind="model.$hints[property]" class="ng-binding">
                                                </span>
                                    </div>
                                </div>
                                <button class="btn-primary btn-lg">
                                    确定
                                </button>
                                <a class="modifyname-cancel" href="javascript:" dialog-closer="username">
                                    取消
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection