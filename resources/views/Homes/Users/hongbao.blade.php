@extends('homes.layout')

@section('title','饿了么-网上订餐_外卖_饿了么订餐官网')

@section('content')
    <link href="/home/css/vendor.eb86f5.css" rel="stylesheet">
    <link href="/home/css/profile.4b02a0.css" rel="stylesheet">
    <div ng-view="" role="main" class="ng-scope">
        <div class="profile-container container" profile-container="" page-name="hongnbao"
             page-title="个人红包">
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
                            <a href="changepassword">
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
                            我的红包
                        </span>
                    <span class="subtitle ng-binding" ng-bind-html="pageSubtitle | toTrusted">
                        </span>
                </h3>
                <!-- end ngIf: pageTitleVisible -->
                <ul class="hongbao-list clearfix">
                    <!-- ngRepeat: data in pageContext.pageData -->
                    <li class="hongbaoblock ng-scope" ng-repeat="data in pageContext.pageData">
                        <div class="hongbaoblock-count"><span class="hongbaoblock-amount">
                                <em class="ng-binding">15</em>
                                <em class="ng-binding">.0</em></span>
                            <p class="hongbaoblock-condition ng-binding">满15元可用</p>
                        </div>
                        <h3 class="hongbaoblock-name ng-binding">新用户首单红包</h3>
                        <div class="hongbaoblock-intro"><p>仅限手机客户端使用</p><!-- ngIf: data.subscriber_line_number --><p class="ng-binding">2018-03-28<i class="to">至</i>2018-04-03</p></div><!-- ngIf: data.used || data.passed -->
                        <i class="hongbaoblock-tip ng-scope" ng-if="data.used || data.passed"></i>
                        <!-- end ngIf: data.used || data.passed --></li>
                    <!-- end ngRepeat: data in pageContext.pageData --></ul>
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