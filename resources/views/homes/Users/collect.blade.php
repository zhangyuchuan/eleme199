@extends('homes.layout')

@section('title','饿了么-网上订餐_外卖_饿了么订餐官网')

@section('content')
    <link href="/home/css/vendor.eb86f5.css" rel="stylesheet">
    <link href="/home/css/profile.4b02a0.css" rel="stylesheet">
<div ng-view="" role="main" class="ng-scope">
    <div class="favor profile-container container" profile-container="" page-name="favor"
         page-title="我的收藏" page-title-visible="true">
        <div class="clearfix">
            <div class="location" ng-style="{visibility: geohash ? &#39;&#39; : &#39;hidden&#39;}"
                 role="navigation" location="">
                        <span>
                            当前位置:
                        </span>
                <span class="location-current">
                            <a class="inherit ng-binding" ng-href="javascript:;" ubt-click="401"
                               ng-bind="place.name || place.address" href="javascript:;">
                                昌平区204县道(北京市育荣教育园区西)
                            </a>
                        </span>
                <span class="location-change location-hashistory" ng-class="{ &#39;location-hashistory&#39;: user.username &amp;&amp; userPlaces &amp;&amp; userPlaces.length &gt; 0 }">
                            <a ng-href="javascript:;" ubt-click="400" hardjump="" href="javascript:;">
                                [切换地址]
                            </a>
                            <ul class="dropbox location-dropbox" ubt-visit="398">
                                <li class="arrow">
                                </li>
                                <!-- ngRepeat: userPlace in userPlaces | filter:filterPlace | limitTo:
                                4 -->
                                <li ng-repeat="userPlace in userPlaces | filter:filterPlace | limitTo: 4"
                                    class="ng-scope">
                                    <a class="inherit ng-binding" ng-href="javascript:;"
                                       ng-bind="userPlace.name" ubt-click="399" href="javascript:;">
                                        昌平区204县道(北京市育荣教育园区西)
                                    </a>
                                </li>
                                <!-- end ngRepeat: userPlace in userPlaces | filter:filterPlace | limitTo:
                                4 -->
                                <li class="changelocation">
                                    <a ng-href="javascript:;" hardjump="" href="javascript:;">
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
                                我的收藏
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
                    <li ng-class="{ active: pageName === &#39;order&#39; }">
                        <a href="/orders">
                            近三个月订单
                        </a>
                    </li>
                    <li ng-class="{ active: pageName === &#39;order-unrated&#39; }">
                        <a href="javascript:;">
                            待评价订单
                            <!-- ngIf: unratedNumber -->
                        </a>
                    </li>
                    <li ng-class="{ active: pageName === &#39;order-refunding&#39; }">
                        <a href="javascript:;">
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
                        <a href="javascript:;">
                            我的红包
                        </a>
                    </li>
                    <li ng-class="{ active: pageName === &#39;balance&#39; }">
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
                        <a href="/add">
                            地址管理
                        </a>
                    </li>
                    <li ng-class="{ active: pageName === &#39;security-center&#39; }">
                        <a href="https://www.ele.me/profile/security">
                            安全中心
                        </a>
                    </li>
                    <li ng-class="{ active: pageName === &#39;changepassword&#39; }">
                        <a href="javascript:;">
                            修改密码
                        </a>
                    </li>
                </ul>
            </li>
            <li class="profile-sidebar-section">
                <h2 class="profile-sidebar-sectiontitle active" ng-class="{ active: pageName === &#39;favor&#39; }">
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
                            我的收藏
                        </span>
                <span class="subtitle ng-binding" ng-bind-html="pageSubtitle | toTrusted">
                        </span>
            </h3>
            <!-- end ngIf: pageTitleVisible -->
            <div class="profile-panelcontent" ng-transclude="">
                <div class="loading ng-binding ng-isolate-scope ng-hide" loading="" content="正在载入商家信息..."
                     ng-show="favorLoading">
                    <!-- ngIf: type==='profile' -->
                    <img ng-if="type===&#39;profile&#39;" src="./个人中心_我的收藏 _ 饿了么网上订餐_files/profile-loading.4984fa.gif"
                         alt="正在加载" class="ng-scope">
                    <!-- end ngIf: type==='profile' -->
                    <!-- ngIf: type==='normal' -->
                    正在载入商家信息...
                </div>
                @foreach($shop_data as $v)
                <div class="favor-restaurants ng-scope" ng-show="!favorLoading" style="">

                    <div class="">
                        <!-- ngRepeat: restaurant in inRegionFavors -->
                        <div class="favor-rstblock" ng-class="{&#39;outofregion&#39;:outofregion}"
                             favor-rst-block="" ng-repeat="restaurant in inRegionFavors">
                            <div class="favor-rstblock-header">
                                <div class="favor-rstblock-headerbg" ng-style="{&#39;background-image&#39;: &#39;url(&#39; + backgroundUrl + &#39;)&#39;}"
                                     style="background-image: url(&quot;//shadow.elemecdn.com/faas/desktop/media/img/favor-rst-bg1.804470.jpg&quot;);">
                                </div>
                                <a class="favor-rstblock-name ng-binding" ng-bind="restaurant.name" ng-href="/shop/161298449"
                                   title="前往主食爱上粥(三期百汇店)" href="https://www.ele.me/shop/161298449">
                                    {{ $v->name }}
                                </a>
                                <!-- ngIf: !restaurant.is_opening && !outofregion -->
                                <!-- ngIf: restaurant.status===5 && !outofregion -->
                            </div>
                            <a ng-href="" title="前往主食爱上粥(三期百汇店)" href="/shop">
                                <img ng-src=""
                                     class="favor-rstblock-logo" alt="商家 LOGO" src="{{ $v->logo }}">
                            </a>
                            <div class="favor-rstblock-starrating icon-star">
                                        <span class="icon-star" ng-style="{ width: (restaurant.rating * 20) + &#39;%&#39; }"
                                              style="width: {{ $v->score }}%;">
                                        </span>
                            </div>
                            <div class="favor-rstblock-content">
                                <div class="favor-rstblock-item">
                                    <p>
                                        起送价
                                    </p>
                                    <p class="value icon-yen ng-binding" ng-bind="restaurant.float_minimum_order_amount">
                                        {{ $v->fsmoney }}
                                    </p>
                                </div>
                                <div class="favor-rstblock-item">
                                    <p>
                                        送餐时间
                                    </p>
                                    <p class="value time ng-binding" ng-bind="restaurant.order_lead_time_text ||  0">
                                        {{ $v->finishtime }}
                                    </p>
                                </div>
                            </div>
                            <div class="favor-rstblock-activity">
                                <!-- ngRepeat: activity in restaurant.activities | limitTo: 8 -->
                                <a href="/delete/{{$v->id}}"><i class="favor-rstblock-cancel icon-trash" ng-click="showRemoveMask($index)">

                                </i></a>
                            </div>
                        </div>
                        <!-- end ngRepeat: restaurant in inRegionFavors -->
                        <!-- ngIf: !inRegionFavors.length -->
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection