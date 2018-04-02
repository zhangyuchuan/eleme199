@extends('Homes.layout')
@section('title','饿了么-网上订餐_外卖_饿了么订餐官网')
@section('content')
    <div class="container clearfix scope">
        <div class="location" style="{visibility: geohash ? '' : 'hidden'}" role="navigation"
             location="" if="geohash">
        <span>
        当前位置:
        </span>
            <span class="location-current">
            <a class="inherit binding" href="/place/wx4eyv2e1qf" ubt-click="401" bind="place.name || place.address"
               href="/place/wx4eyv2e1qf">
                昌平区回龙观村东区(龙域中街南70米)
            </a>
        </span>
            <span class="location-change" class="{ 'location-hashistory': user.username && userPlaces && userPlaces.length > 0 }">
            <a href="/home" ubt-click="400" hardjump="" href="/home">
                [切换地址]
            </a>
            <ul class="dropbox location-dropbox" ubt-visit="398">
                <li class="arrow">
                </li>
                <li class="changelocation">
                    <a href="/home" hardjump="" href="/home">
                        修改收货地址
                        <span class="icon-location">
                        </span>
                    </a>
                </li>
            </ul>
        </span>
        </div>
        <div class="place-search" role="search" search-input="">
            <form action="/home/dosearch" method="post"  id="form" >
                {{csrf_field()}}
                <label for="globalsearch">
                    搜索商家或美食
                </label>

                <input id="globalsearch" name="keywords" value="{{$keywords}}" type="text" class="place-search-input ng-pristine ng-valid"
                       ng-model="searchText" autocomplete="" placeholder="搜索商家,美食...">
                <button class="place-search-btn icon-search" ubt-click="403" ng-attr-ubt-data-keyword=""
                        title="搜索商家或美食" ubt-data-keyword="">
                </button>
            </form>
            <script>
                $('#form').submit(function(){
                    var globalsearch = $('#globalsearch').val();
                    if(globalsearch==''){
                        return false;
                    }
                })
            </script>
        </div>
    </div>
    <div ng-show="!outsideRstsVisible" class="container ng-scope">
        @if(!$shops->isEmpty())
        @foreach($shops as $k=>$v)
        <table ng-repeat="group in rstGroups | orderBy: [ &#39;-is_opening&#39;, &#39;status&#39; ] track by group.restaurant.id"
               class="typo-table search-foodtable ng-scope">

            <tbody >

            {{--<div style="height:10px"></div>--}}
            <tr >
                <th colspan="4" >
                    <h4 class="typo-h5" >
                        <a ng-href="/shop/1112108" class="ng-binding" href="https://www.ele.me/shop/1112108">
                            {{$v->name}}
                        </a>
                        <div class="rstblock-activity">
                            <i ng-repeat="activity in group.restaurant.activities" ng-bind="activity.icon_name"
                               ng-style="activity.icon_color ? {background: (&#39;#&#39; + activity.icon_color)} : &#39;&#39;"
                               class="ng-binding ng-scope" style="background: rgb(153, 153, 153);">
                                票
                            </i>
                        </div>
                    </h4>
                    <div class="starrating icon-star ng-isolate-scope" title="评分3.7分" rate-star=""
                         rating="group.restaurant.rating">
                                    <span class="icon-star" ng-style="{ width: (rating * 20) + &#39;%&#39; }"
                                          style="width: {{$v->score}}%;">
                                    </span>
                    </div>
                    <small class="ng-binding">
                    </small>
                    <small ng-if="group.restaurant.order_lead_time_text" class="ng-scope">
                        平均
                        <span class="highlight ng-binding">
                                        {{$v->finishtime}}
                                    </span>
                        分钟送达
                    </small>
                </th>
            </tr>
            @foreach($v->goods as $m=>$n)
                @if($m<=2)
            <tr ng-repeat="food in group.foods | limitTo: group.restaurant.limitTo track by $index"
                class="ng-scope">
                <td>
                    <a ng-if="group.restaurant.is_opening" ng-href="/shop/1112108#155065643"
                       ubt-click="510" ubt-data-restaurant_id="1112108" ubt-data-dish_id="155065643"
                       class="ng-scope" href="https://www.ele.me/shop/1112108#155065643">
                                    <span class="ng-binding">
                                        {{$n->gname}}
                                        <br>
                                        <small class="ng-binding">
                                        </small>
                                    </span>
                    </a>
                </td>
                <td class="search-col2">
                    <a ng-if="group.restaurant.is_opening" ng-href="/shop/1112108#155065643"
                       class="ng-binding ng-scope" href="https://www.ele.me/shop/1112108#155065643">
                        ¥ {{$n->price}}
                    </a>
                </td>
                <td class="search-col3">
                    <a class="btn btn-sm ng-binding ng-scope" ng-class="{ &#39;bookonly&#39;: group.restaurant.status === 5 }"
                       ng-if="group.restaurant.is_opening" ng-href="/shop/1112108#155065643" ng-click="setCart(group.restaurant.id, food.id)"
                       ng-bind="group.restaurant.status === 1 ? &#39;去购买&#39; : &#39;可预订&#39;"
                       ubt-click="511" ubt-data-restaurant_id="" ubt-data-dish_id="155065643"
                       href="https://www.ele.me/shop/1112108#155065643">
                        去购买
                    </a>
                </td>
                <td class="search-col4">
                    <div class="starrating icon-star ng-isolate-scope" title="评分分" rate-star=""
                         rating="food.rating">
                                    <span class="icon-star" ng-style="{ width: (rating * 20) + &#39;%&#39; }" style="width: {{$n->gscore}}%;">
                                    </span>
                    </div>
                    <div class="ng-binding">
                        月售{{$n->salecnt}}份
                    </div>
                </td>
            </tr>
            @endif
            @endforeach

            </tbody>
        </table>
        @endforeach
            @else
            <div class="search-nodata ng-scope" ng-if="status === 'COMPLETE' &amp;&amp; !rstGroups.length"
                 ng-attr-ubt-data-keyword="{{$keywords}}" ubt-data-keyword="    ">
                <img class="nodata" width="100" src="/home/img/icon-restaurant.b3a359.png"
                     alt="找不到商家">
                <div class="typo-small">
                    附近没有符合您的关键字的商家和美食，换个关键字试试吧
                </div>
            </div>
            @endif
    </div>
    @endsection

