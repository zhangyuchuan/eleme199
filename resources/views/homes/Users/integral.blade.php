@extends('homes.layout')

@section('title','饿了么-网上订餐_外卖_饿了么订餐官网')

@section('content')
    <link href="/home/css/vendor.eb86f5.css" rel="stylesheet">
    <link href="/home/css/profile.4b02a0.css" rel="stylesheet">
<div ng-view="" role="main" class="ng-scope">
    <div class="profile-container container" profile-container="" page-name="balance"
         page-title="账户余额">
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
                                       ng-bind="userPlace.name" ubt-click="399" href="/place/wx4spk2jk0db?latitude=40.102375&amp;longitude=116.334404">
                                        昌平区204县道(北京市育荣教育园区西)
                                    </a>
                                </li>
                                <!-- end ngRepeat: userPlace in userPlaces | filter:filterPlace | limitTo:
                                4 -->
                                <li class="changelocation">
                                    <a ng-href="/home" hardjump="" href="/home">
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
                                我的积分
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
                    <a href="/center">
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
                        <a href="/orders">
                            近三个月订单
                        </a>
                    </li>
                    <li class="{ active: pageName === &#39;order-unrated&#39; }">
                        <a href="/orders">
                            待评价订单
                            <!-- ngIf: unratedNumber -->
                        </a>
                    </li>
                    <li class="{ active: pageName === &#39;order-refunding&#39; }">
                        <a href="/orders">
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
                    <li ng-class="{ active: pageName === &#39;balance&#39; }" class="active">
                        <a href="/hongbao">
                            个人红包
                        </a>
                    </li>
                    <li ng-class="{ active: pageName === &#39;balance&#39; }" class="active">
                        <a href="/balance">
                            账户余额
                        </a>
                    </li>
                    <li ng-class="{ active: pageName === &#39;points&#39; }">
                        <a href="/integral">
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
                        <a href="/data">
                            个人资料
                        </a>
                    </li>
                    <li ng-class="{ active: pageName === &#39;address&#39; }">
                        <a href="add">
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
                    <a href="/collect">
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
                            我的积分
                        </span>
                <span class="subtitle ng-binding" ng-bind-html="pageSubtitle | toTrusted">
                        </span>
            </h3>
            <!-- end ngIf: pageTitleVisible -->
            <div class="profile-panelcontent" ng-transclude="">
                <div class="points-summary index ng-scope">
                    <p class="points-tip">
                                <span>
                                    当前账户积分：
                                </span>
                        <b class="points-number ng-binding" ng-bind="points">
                            {{$userinfo['score']}}
                        </b>
                        分
                    </p>
                    <p class="points-link">
                        <a class="btn-link" href="https://www.ele.me/support/question/hotissue"
                           target="_blank">
                            如何获得积分？
                        </a>
                    </p>
                </div>
                <h4 class="points-detailtitle ng-scope">
                    最近30天积分记录
                </h4>
                <div class="points-detail ng-scope">
                    <div class="points-table">
                        <div class="points-table-row points-table-title">
                                    <span class="points-table-createtime">
                                        创建时间
                                    </span>
                            <span class="points-table-delta">
                                        积分变化
                                    </span>
                            <span class="points-table-detail">
                                        详情
                                    </span>
                        </div>
                        <!-- ngRepeat: record in records.pageData -->
                    </div>
                    <div class="loading ng-binding ng-isolate-scope ng-hide" loading="" content="正在载入积分记录..."
                         ng-show="pointsLoading">
                        <!-- ngIf: type==='profile' -->
                        <img ng-if="type===&#39;profile&#39;" src="./个人中心_积分详情 _ 饿了么网上订餐_files/profile-loading.4984fa.gif"
                             alt="正在加载" class="ng-scope">
                        <!-- end ngIf: type==='profile' -->
                        <!-- ngIf: type==='normal' -->
                        正在载入积分记录...
                    </div>
                    <!-- ngIf: !pointsLoading && !records.pageData.length -->
                    <div class="nodata ng-isolate-scope" nodatatip="" ng-if="!pointsLoading &amp;&amp; !records.pageData.length">
                        <p class="nodata-container ng-binding" ng-bind-html="content | toTrusted">
                            暂无记录
                        </p>
                    </div>
                    <!-- end ngIf: !pointsLoading && !records.pageData.length -->
                </div>
                <div pagination="" pagination-context="records" pagination-data="recordsData"
                     class="ng-scope pagination">
                    <ul>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection