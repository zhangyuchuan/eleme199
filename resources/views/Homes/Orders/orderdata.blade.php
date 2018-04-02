@extends('homes.layout')

@section('title','饿了么-网上订餐_外卖_饿了么订餐官网')

@section('content')
    <link href="/home/css/vendor.eb86f5.css" rel="stylesheet">
    <link href="/home/css/profile.4b02a0.css" rel="stylesheet">
    <!-- ngView: -->
<div ng-view="" role="main" class="ng-scope">
    <div class="profile-container container" profile-container="" page-title="订单详情"
         page-name="orderProgress">
        <div class="clearfix">
            <div class="location" ng-style="{visibility: geohash ? &#39;&#39; : &#39;hidden&#39;}"
                 role="navigation" location="">
                        <span>
                            当前位置:
                        </span>
                <span class="location-current">
                            <a class="inherit ng-binding" ng-href="/place/wx4eyzkvjrj8" ubt-click="401"
                               ng-bind="place.name || place.address" href="https://www.ele.me/place/wx4eyzkvjrj8">
                                回龙观西大街冠庭中心
                            </a>
                        </span>
                <span class="location-change" ng-class="{ &#39;location-hashistory&#39;: user.username &amp;&amp; userPlaces &amp;&amp; userPlaces.length &gt; 0 }">
                            <a ng-href="/home" ubt-click="400" hardjump="" href="https://www.ele.me/home">
                                [切换地址]
                            </a>
                            <ul class="dropbox location-dropbox" ubt-visit="398">
                                <li class="arrow">
                                </li>
                                <!-- ngRepeat: userPlace in userPlaces | filter:filterPlace | limitTo:
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
                                订单详情
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
                            我的金币
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
                            订单详情
                        </span>
                <span class="subtitle ng-binding" ng-bind-html="pageSubtitle | toTrusted">
                        </span>
            </h3>
            <!-- end ngIf: pageTitleVisible -->
            <div class="profile-panelcontent" ng-transclude="">
                <div class="loading ng-binding ng-isolate-scope ng-hide" loading="" ng-hide="progressDisplay">
                    <!-- ngIf: type==='profile' -->
                    <img ng-if="type===&#39;profile&#39;" src="./orderdata_files/profile-loading.4984fa.gif"
                         alt="正在加载" class="ng-scope">
                    <!-- end ngIf: type==='profile' -->
                    <!-- ngIf: type==='normal' -->
                    正在载入数据...
                </div>
                <div ng-show="progressDisplay" class="ng-scope">
                    <div orderprogress-refundinfo="" link="orderReady" class="ng-isolate-scope">
                        <!-- ngIf: refundingShow -->
                    </div>
                    <!-- ngIf: data -->
                    <ul class="orderprogress-topcard orderprogress-timeline ng-isolate-scope"
                        orderprogress-timeline="" link="orderReady">
                        <!-- ngRepeat: item in timeline -->
                        <li ng-repeat="item in timeline" ng-class="{active: item.status === &#39;ongoing&#39;}"
                            class="ng-binding ng-scope">
                            订单已提交
                        </li>
                        <!-- end ngRepeat: item in timeline -->
                        <li ng-repeat="item in timeline" ng-class="{active: item.status === &#39;ongoing&#39;}"
                            class="ng-binding ng-scope">
                            商家已接单
                        </li>
                        <!-- end ngRepeat: item in timeline -->
                        <li ng-repeat="item in timeline" ng-class="{active: item.status === &#39;ongoing&#39;}"
                            class="ng-binding ng-scope active">
                            已送达
                        </li>
                        <!-- end ngRepeat: item in timeline -->
                    </ul>
                    <div class="orderprogress-card ng-isolate-scope" orderprogress-status=""
                         link="orderReady">
                        <!-- ngIf: showStatus -->
                        <div class="orderprogress-status ng-scope" ng-if="showStatus">
                            <h5 class="orderprogress-statustitle ng-binding" ng-bind-html="status.title | toTrusted">
                                订单已完成
                            </h5>
                            <p class="orderprogress-statusdesc ng-binding" ng-bind-html="status.description | toTrusted">
                                18:48确认送达
                            </p>
                            <div class="orderprogress-statusbuttons">
                                <!-- ngIf: remind.show -->
                                <!-- ngRepeat: button in status.buttons -->
                                <a href="javascript:" ng-repeat="button in status.buttons" ng-bind="button.text"
                                   ng-class="button.style" ng-click="button.method()" class="ng-binding ng-scope linktype">
                                    再来一单
                                </a>
                                <!-- end ngRepeat: button in status.buttons -->
                            </div>
                        </div>
                        <!-- end ngIf: showStatus -->
                    </div>
                    <div orderprogress-rstinfo="" link="orderReady" class="ng-isolate-scope">
                        <div class="orderprogress-rstinfo">
                            @foreach($shop_all as $v)
                            <a ng-href="/shop/155134506" href="https://www.ele.me/shop/155134506">
                                <img class="orderprogress-rstimg" ng-src=""
                                     width="44" height="44" ng-alt="西域美食中国兰州牛肉面" src="{{ $shop['logo']}}">
                            </a>
                            @endforeach
                            <div class="orderprogress-rstgrid">
                                <h4 class="orderprogress-rstname">

                                    @foreach($shop_all as $v)
                                    <a class="inherit ng-binding" ng-href="/shop/155134506" ng-bind="restaurant.name"
                                       href="https://www.ele.me/shop/155134506">
                                        {{ $shop['name']}}
                                    </a>
                                        @endforeach
                                </h4>
                                <div class="orderprogress-rstextra">
                                            <span ng-bind="&#39;订单号：&#39; + order.unique_id" class="ng-binding">
                                                订单号：1217606784916104398
                                            </span>
                                    <span ng-bind="&#39;商家电话：&#39; + restaurant.phoneMade" class="ng-binding">
                                                商家电话：15321281416
                                            </span>
                                </div>
                            </div>
                            <div class="orderprogress-rstoperate">
                                <!-- ngIf: !favored -->
                                <a href="javascript:" class="rstinfo-favor ng-scope" ng-if="!favored"
                                   ng-click="favor(&#39;addition&#39;)">
                                    <i class="icon icon-order-favor">
                                    </i>
                                    收藏
                                </a>
                                <!-- end ngIf: !favored -->
                                <!-- ngIf: favored -->
                                <!-- ngIf: !complaintStatus -->
                                <a href="javascript:" ng-if="!complaintStatus" dialog-trigger="complaintDialog"
                                   class="ng-scope">
                                    <i class="icon icon-order-complaint">
                                    </i>
                                    投诉
                                </a>
                                <!-- end ngIf: !complaintStatus -->
                                <!-- ngIf: complaintStatus===1 -->
                            </div>
                        </div>
                        <div class="dialog" role="dialog" dialog="complaintDialog" style="display: none;">
                            <div class="dialog-close icon-close">
                            </div>
                            <div class="dialog-content" ng-transclude="">
                                <h5 class="complaint-title ng-scope">
                                    投诉举报
                                </h5>
                                <form ng-submit="complaint()" class="ng-scope ng-pristine ng-valid">
                                    <!-- ngRepeat: reasonText in complaintType.typeMap -->
                                    <label class="complaint-field ng-scope" ng-repeat="reasonText in complaintType.typeMap">
                                        <input name="reason" type="radio" ng-model="complaintType.type" ng-value="$index"
                                               class="ng-pristine ng-valid" value="0">
                                        <span ng-bind="reasonText" class="ng-binding">
                                                    商家已确认，但没有送外卖
                                                </span>
                                    </label>
                                    <!-- end ngRepeat: reasonText in complaintType.typeMap -->
                                    <label class="complaint-field ng-scope" ng-repeat="reasonText in complaintType.typeMap">
                                        <input name="reason" type="radio" ng-model="complaintType.type" ng-value="$index"
                                               class="ng-pristine ng-valid" value="1">
                                        <span ng-bind="reasonText" class="ng-binding">
                                                    商家参加了活动，但没有优惠
                                                </span>
                                    </label>
                                    <!-- end ngRepeat: reasonText in complaintType.typeMap -->
                                    <label class="complaint-field ng-scope" ng-repeat="reasonText in complaintType.typeMap">
                                        <input name="reason" type="radio" ng-model="complaintType.type" ng-value="$index"
                                               class="ng-pristine ng-valid" value="2">
                                        <span ng-bind="reasonText" class="ng-binding">
                                                    其他
                                                </span>
                                    </label>
                                    <!-- end ngRepeat: reasonText in complaintType.typeMap -->
                                    <label class="complaint-field">
                                                <textarea ng-model="complaintType.reason_text" rows="2" cols="40" ng-disabled="complaintType.type !== 2"
                                                          class="ng-pristine ng-valid">
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
                    <div class="orderprogress-cardtable">
                        <div class="orderprogress-cardcell ng-isolate-scope" orderprogress-total=""
                             link="orderReady">
                            <div class="orderprogress-total">
                                <div class="orderprogress-totalrow orderprogress-totaltitle">
                                            <span class="cell name">
                                                菜品
                                            </span>
                                    <span class="cell quantity">
                                                数量
                                            </span>
                                    <span class="cell price">
                                                小计（元）
                                            </span>
                                </div>
                                <!-- ngRepeat: row in totalList -->
                                <div ng-repeat="row in totalList" ng-switch="" on="row.type" class="ng-scope">
                                    <!-- ngSwitchWhen: baseline -->
                                    <!-- ngSwitchWhen: basketTitle -->
                                    <!-- ngSwitchWhen: food -->
                                        @foreach($all as $v)


                                    <div ng-switch-when="food" class="orderprogress-totalrow ng-scope">
                                                <span class="cell name ng-binding" ng-bind="row.food.name">

                                                    {{ $v->goods['gname'] }}
                                                </span>


                                        <span class="cell quantity ng-binding" ng-bind="row.food.quantity">
                                                   {{ $v->bcnt}}
                                                </span>

                                        <span class="cell price ng-binding" ng-bind="row.food.price * row.food.quantity | number:2">

                                                {{ $v->goods['price'] * $v->bcnt }}

                                                </span>
                                        <?php $arr[] =  $v->goods['price'] * $v->bcnt  ?>

                                    </div>

                                    @endforeach

                                    <!-- ngSwitchWhen: extra -->
                                </div>
                                <!-- end ngRepeat: row in totalList -->


                                <!-- end ngRepeat: row in totalList -->
                                <div ng-repeat="row in totalList" ng-switch="" on="row.type" class="ng-scope">
                                    <!-- ngSwitchWhen: baseline -->
                                    <div ng-switch-when="baseline" class="orderprogress-baseline ng-scope">
                                    </div>
                                    <!-- ngSwitchWhen: basketTitle -->
                                    <!-- ngSwitchWhen: food -->
                                    <!-- ngSwitchWhen: extra -->
                                </div>
                                <!-- end ngRepeat: row in totalList -->
                                <div class="orderprogress-totalactual">
                                    实际支付：
                                    <span ng-bind="order.total_amount | number:2" class="ng-binding">
                                                <?php echo array_sum($arr)?>
                                            </span>
                                </div>
                            </div>
                        </div>
                        <div class="orderprogress-cardcell rightside ng-isolate-scope" orderprogress-deliveryinfo=""
                             link="orderReady">
                            <div class="orderprogress-deliveryinfo">
                                <h5 class="orderprogress-deliverytitle">
                                    配送信息
                                </h5>
                                <div class="orderprogress-deliverygroup">
                                    <p>
                                                <span class="orderprogress-deliverykey">
                                                    配送方式：
                                                </span>
                                        <span class="ng-binding">
                                                    蜂鸟专送
                                                </span>
                                    </p>
                                    <p>
                                                <span class="orderprogress-deliverykey">
                                                    送达时间：
                                                </span>
                                        <span ng-bind="order.detail_info.deliver_description" class="ng-binding">
                                                    尽快送出
                                                </span>
                                    </p>
                                </div>
                                <div class="orderprogress-deliverygroup">
                                    <p>
                                                <span class="orderprogress-deliverykey">
                                                    联 系 人：
                                                </span>
                                        <span ng-bind="order.detail_info.consignee" class="ng-binding">
                                                    徐(先生)
                                                </span>
                                    </p>
                                    <p>
                                                <span class="orderprogress-deliverykey">
                                                    联系电话：
                                                </span>
                                        <span ng-bind="order.detail_info.phone" class="ng-binding">
                                                    18310462731
                                                </span>
                                    </p>
                                    <p>
                                                <span class="orderprogress-deliverykey">
                                                    收货地址：
                                                </span>
                                        <span ng-bind="order.detail_info.address" class="ng-binding">
                                                    科信马连店甲6号 对面六百米理发店
                                                </span>
                                    </p>
                                </div>
                                <div class="orderprogress-deliverygroup tail">
                                    <p>
                                                <span class="orderprogress-deliverykey">
                                                    发票信息：
                                                </span>
                                        <span ng-bind="order.detail_info.invoice || &#39;无发票&#39;" class="ng-binding">
                                                    无发票
                                                </span>
                                    </p>
                                    <p>
                                                <span class="orderprogress-deliverykey">
                                                    备 注：
                                                </span>
                                        <span ng-bind="order.detail_info.description || &#39;无备注&#39;" class="ng-binding">
                                                    不要辣, 不要辣，两人餐具，把辣椒单独放个小包包带过来，这样，要多一点
                                                </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="orderprogress-roundborder">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection