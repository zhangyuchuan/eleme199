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
                                账户余额
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
                    <li ng-class="{ active: pageName === &#39;balance&#39; }" class="active">
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
                            账户余额
                        </span>
                <span class="subtitle ng-binding" ng-bind-html="pageSubtitle | toTrusted">
                        </span>
            </h3>
            <!-- end ngIf: pageTitleVisible -->
            <div class="profile-panelcontent" ng-transclude="">
                <!-- ngIf: !bindmobile -->
                <div class="balance-summary index ng-scope">
                    <p class="balance-tip">
                                <span class="balance-summary-title">
                                    当前账户余额：
                                </span>
                        <b class="balance-number ng-binding" ng-bind="balance.number">
                            0
                        </b>
                        元
                    </p>
                    <p class="balance-fn">
                                <span class="btn-default balance-btn disabled" tooltip="暂不支持提现，可使用余额消费">
                                    提现
                                </span>
                    </p>
                </div>
                <div class="balance-detail ng-scope">
                    <div class="balance-detail-header">
                        <h2 class="balance-detail-title">
                            账户资产明细
                        </h2>
                        <p class="selector-list ng-isolate-scope" selector="" label="分类" data="balance.type"
                           filter-selected="filter.type">
                                    <span class="selector-label ng-binding" ng-bind="label">
                                        分类
                                    </span>
                            <span class="selector-content">
                                        <!-- ngRepeat: item in data -->
                                        <a class="selector-item ng-binding ng-scope active" href="javascript:"
                                           ng-repeat="item in data" ng-class="{&#39;active&#39;: item.val === selected}"
                                           ng-bind="item.key" ng-click="choose(item)">
                                            全部
                                        </a>
                                <!-- end ngRepeat: item in data -->
                                        <a class="selector-item ng-binding ng-scope" href="javascript:" ng-repeat="item in data"
                                           ng-class="{&#39;active&#39;: item.val === selected}" ng-bind="item.key"
                                           ng-click="choose(item)">
                                            充值
                                        </a>
                                <!-- end ngRepeat: item in data -->
                                        <a class="selector-item ng-binding ng-scope" href="javascript:" ng-repeat="item in data"
                                           ng-class="{&#39;active&#39;: item.val === selected}" ng-bind="item.key"
                                           ng-click="choose(item)">
                                            余额消费
                                        </a>
                                <!-- end ngRepeat: item in data -->
                                        <a class="selector-item ng-binding ng-scope" href="javascript:" ng-repeat="item in data"
                                           ng-class="{&#39;active&#39;: item.val === selected}" ng-bind="item.key"
                                           ng-click="choose(item)">
                                            第三方支付消费
                                        </a>
                                <!-- end ngRepeat: item in data -->
                                        <a class="selector-item ng-binding ng-scope" href="javascript:" ng-repeat="item in data"
                                           ng-class="{&#39;active&#39;: item.val === selected}" ng-bind="item.key"
                                           ng-click="choose(item)">
                                            支付失败退款
                                        </a>
                                <!-- end ngRepeat: item in data -->
                                        <a class="selector-item ng-binding ng-scope" href="javascript:" ng-repeat="item in data"
                                           ng-class="{&#39;active&#39;: item.val === selected}" ng-bind="item.key"
                                           ng-click="choose(item)">
                                            订单退款
                                        </a>
                                <!-- end ngRepeat: item in data -->
                                        <a class="selector-item ng-binding ng-scope" href="javascript:" ng-repeat="item in data"
                                           ng-class="{&#39;active&#39;: item.val === selected}" ng-bind="item.key"
                                           ng-click="choose(item)">
                                            提现
                                        </a>
                                <!-- end ngRepeat: item in data -->
                                    </span>
                        </p>
                        <p class="selector-list ng-isolate-scope" selector="" label="时间" data="balance.days"
                           filter-selected="filter.days">
                                    <span class="selector-label ng-binding" ng-bind="label">
                                        时间
                                    </span>
                            <span class="selector-content">
                                        <!-- ngRepeat: item in data -->
                                        <a class="selector-item ng-binding ng-scope" href="javascript:" ng-repeat="item in data"
                                           ng-class="{&#39;active&#39;: item.val === selected}" ng-bind="item.key"
                                           ng-click="choose(item)">
                                            今天
                                        </a>
                                <!-- end ngRepeat: item in data -->
                                        <a class="selector-item ng-binding ng-scope" href="javascript:" ng-repeat="item in data"
                                           ng-class="{&#39;active&#39;: item.val === selected}" ng-bind="item.key"
                                           ng-click="choose(item)">
                                            近7天
                                        </a>
                                <!-- end ngRepeat: item in data -->
                                        <a class="selector-item ng-binding ng-scope" href="javascript:" ng-repeat="item in data"
                                           ng-class="{&#39;active&#39;: item.val === selected}" ng-bind="item.key"
                                           ng-click="choose(item)">
                                            近15天
                                        </a>
                                <!-- end ngRepeat: item in data -->
                                        <a class="selector-item ng-binding ng-scope" href="javascript:" ng-repeat="item in data"
                                           ng-class="{&#39;active&#39;: item.val === selected}" ng-bind="item.key"
                                           ng-click="choose(item)">
                                            1个月
                                        </a>
                                <!-- end ngRepeat: item in data -->
                                    </span>
                        </p>
                    </div>
                    <div class="balance-table">
                        <div class="balance-table-row balance-table-title">
                                    <span class="balance-table-date">
                                        创建时间
                                    </span>
                            <span class="balance-table-type">
                                        交易类型
                                    </span>
                            <span class="balance-table-money">
                                        金额变更
                                    </span>
                            <span class="balance-table-status">
                                        余额
                                    </span>
                        </div>
                        <!-- ngRepeat: record in records.pageData -->
                    </div>
                    <div class="loading ng-binding ng-isolate-scope ng-hide" loading="" content="正在载入资产明细..."
                         ng-show="balanceLoading">
                        <!-- ngIf: type==='profile' -->
                        <img ng-if="type===&#39;profile&#39;" src="./个人中心_账户余额 _ 饿了么网上订餐_files/profile-loading.4984fa.gif"
                             alt="正在加载" class="ng-scope">
                        <!-- end ngIf: type==='profile' -->
                        <!-- ngIf: type==='normal' -->
                        正在载入资产明细...
                    </div>
                    <!-- ngIf: !balanceLoading && !records.pageData.length -->
                    <div class="nodata ng-isolate-scope" nodatatip="" ng-if="!balanceLoading &amp;&amp; !records.pageData.length">
                        <p class="nodata-container ng-binding" ng-bind-html="content | toTrusted">
                            暂无记录
                        </p>
                    </div>
                    <!-- end ngIf: !balanceLoading && !records.pageData.length -->
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