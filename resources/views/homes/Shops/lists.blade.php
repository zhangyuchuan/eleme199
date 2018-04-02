@extends('homes.layout')

@section('title','饿了么-网上订餐_外卖_饿了么订餐官网')

@section('content')

    <!-- 地址栏 -->
    <div class="container clearfix scope">
        <!-- <div class="location" style="{visibility: geohash ? '' : 'hidden'}"
        role="navigation" location="" if="geohash"> -->
        <span>
                当前位置:
            </span>
        <!-- <span class="location-current">
        <a class="inherit binding" href="/place/wx4eyv2e1qf" ubt-click="401" bind="place.name || place.address" href="/place/wx4eyv2e1qf">昌平区回龙观村东区(龙域中街南70米)</a>
        </span>
        <span class="location-change" class="{ 'location-hashistory': user.username && userPlaces && userPlaces.length > 0 }">
        <a href="/home" ubt-click="400" hardjump="" href="/home">[切换地址]</a>
        <ul class="dropbox location-dropbox" ubt-visit="398">
        <li class="arrow"></li>
        <li class="changelocation">
        <a href="/home" hardjump="" href="/home">
        修改收货地址
        <span class="icon-location"></span>
        </a>
        </li>
        </ul>
        </span>
        <span transclude="">
        <i class="icon-arrow-right scope"></i>
        <span class="scope">服务中心</span>
        </span>-->
    </div>
    </div>
<div class="container ng-scope" ng-show="!recentBoughtOnly">
            <div class="excavator container">
                <div class="excavator-filter ng-scope">
                    <span>
                        商家分类:
                    </span>
                    <a class="excavator-filter-item ng-binding ng-scope active" href="javascript:">
                        全部商家
                    </a>
                    <a class="excavator-filter-item ng-binding ng-scope" href="javascript:">
                        美食
                    </a>
                    <a class="excavator-filter-item ng-binding ng-scope" href="javascript:">
                        快餐便当
                    </a>
                    <a class="excavator-filter-item ng-binding ng-scope" href="javascript:"
                    ng-repeat="category in rstCategories" ng-class="{'focus': clickedCategory === category.id && (!clickedCategory || clickedCategory < 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 && !pumStream}"
                    ng-bind="category.name" ng-click="changeCategory(category)" ubt-click="380">
                        特色菜系
                    </a>
                    <a class="excavator-filter-item ng-binding ng-scope" href="javascript:"
                    ng-repeat="category in rstCategories" ng-class="{'focus': clickedCategory === category.id && (!clickedCategory || clickedCategory < 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 && !pumStream}"
                    ng-bind="category.name" ng-click="changeCategory(category)" ubt-click="380">
                        异国料理
                    </a>
                    <a class="excavator-filter-item ng-binding ng-scope" href="javascript:"
                    ng-repeat="category in rstCategories" ng-class="{'focus': clickedCategory === category.id && (!clickedCategory || clickedCategory < 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 && !pumStream}"
                    ng-bind="category.name" ng-click="changeCategory(category)" ubt-click="380">
                        小吃夜宵
                    </a>
                    <a class="excavator-filter-item ng-binding ng-scope" href="javascript:"
                    ng-repeat="category in rstCategories" ng-class="{'focus': clickedCategory === category.id && (!clickedCategory || clickedCategory < 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 && !pumStream}"
                    ng-bind="category.name" ng-click="changeCategory(category)" ubt-click="380">
                        甜品饮品
                    </a>
                    <a class="excavator-filter-item ng-binding ng-scope" href="javascript:"
                    ng-repeat="category in rstCategories" ng-class="{'focus': clickedCategory === category.id && (!clickedCategory || clickedCategory < 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 && !pumStream}"
                    ng-bind="category.name" ng-click="changeCategory(category)" ubt-click="380">
                        果蔬生鲜
                    </a>
                    <a class="excavator-filter-item ng-binding ng-scope" href="javascript:"
                    ng-repeat="category in rstCategories" ng-class="{'focus': clickedCategory === category.id && (!clickedCategory || clickedCategory < 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 && !pumStream}"
                    ng-bind="category.name" ng-click="changeCategory(category)" ubt-click="380">
                        商店超市
                    </a>
                    <a class="excavator-filter-item ng-binding ng-scope" href="javascript:"
                    ng-repeat="category in rstCategories" ng-class="{'focus': clickedCategory === category.id && (!clickedCategory || clickedCategory < 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 && !pumStream}"
                    ng-bind="category.name" ng-click="changeCategory(category)" ubt-click="380">
                        早餐
                    </a>
                    <a class="excavator-filter-item ng-binding ng-scope" href="javascript:"
                    ng-repeat="category in rstCategories" ng-class="{'focus': clickedCategory === category.id && (!clickedCategory || clickedCategory < 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 && !pumStream}"
                    ng-bind="category.name" ng-click="changeCategory(category)" ubt-click="380">
                        正餐优选
                    </a>
                    <a class="excavator-filter-item ng-binding ng-scope" href="javascript:"
                    ng-repeat="category in rstCategories" ng-class="{'focus': clickedCategory === category.id && (!clickedCategory || clickedCategory < 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 && !pumStream}"
                    ng-bind="category.name" ng-click="changeCategory(category)" ubt-click="380">
                        下午茶
                    </a>
                    <a class="excavator-filter-item ng-binding ng-scope" href="javascript:"
                    ng-repeat="category in rstCategories" ng-class="{'focus': clickedCategory === category.id && (!clickedCategory || clickedCategory < 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 && !pumStream}"
                    ng-bind="category.name" ng-click="changeCategory(category)" ubt-click="380">
                        夜宵
                    </a>
                    <a class="excavator-filter-item ng-binding ng-scope" href="javascript:"
                    ng-repeat="category in rstCategories" ng-class="{'focus': clickedCategory === category.id && (!clickedCategory || clickedCategory < 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 && !pumStream}"
                    ng-bind="category.name" ng-click="changeCategory(category)" ubt-click="380">
                        鲜花蛋糕
                    </a>
                    <div class="excavator-filter-subbox ng-hide" ng-show="subCategories">
                    </div>
                </div>
            </div>
            <div class="place-rstbox clearfix">
                <div class="clearfix" data="filteredRestaurants = (rstStream.restaurants | filter: rstStream.filter | filter: otherFilter | orderBy: [ '-is_opening', rstStream.orderBy || 'index' ])"
                style="height: 1600px;">
                    <a class="rstblock" href="javascript:;" data-rst-id="152185819" data-bidding=""
                    target="_blank">
                        <div class="rstblock-logo">
                            <img class="rstblock-logo-icon" src="//fuss10.elemecdn.com/8/05/dff0f9f103bd59af10cf0ef3b6accpng.png?imageMogr2/thumbnail/70x70"
                            alt="麻小外卖（上地店）" width="70" height="70">
                            <span>
                                36 分钟
                            </span>
                        </div>
                        <div class="rstblock-content">
                            <div class="rstblock-title">
                                麻小外卖（上地店）
                            </div>
                            <div class="starrating icon-star">
                                <span class="icon-star" style="width:86%;">
                                </span>
                            </div>
                            <span class="rstblock-monthsales">
                                月售175单
                            </span>
                            <div class="rstblock-cost">
                                配送费¥20
                            </div>
                            <div class="rstblock-activity">
                            </div>
                        </div>
                    </a>
                    <a class="rstblock" href="javascript:;" data-rst-id="1863189" data-bidding=""
                    target="_blank">
                        <div class="rstblock-logo">
                            <img class="rstblock-logo-icon" src="//fuss10.elemecdn.com/f/72/e71ae1f13f072841bf6b95867536apng.png?imageMogr2/thumbnail/70x70"
                            alt="沙县小吃卓记黄焖鸡" width="70" height="70">
                            <span>
                                36 分钟
                            </span>
                        </div>
                        <div class="rstblock-content">
                            <div class="rstblock-title">
                                沙县小吃卓记黄焖鸡
                            </div>
                            <div class="starrating icon-star">
                                <span class="icon-star" style="width:78%;">
                                </span>
                            </div>
                            <span class="rstblock-monthsales">
                                月售141单
                            </span>
                            <div class="rstblock-cost">
                                配送费¥6
                            </div>
                            <div class="rstblock-activity">
                            </div>
                        </div>
                    </a>
                    <a class="rstblock" href="javascript:;" data-rst-id="156407866" data-bidding=""
                    target="_blank">
                        <div class="rstblock-logo">
                            <img class="rstblock-logo-icon" src="//fuss10.elemecdn.com/8/b4/ce7b7db8bc1864c6f5c716037a186jpeg.jpeg?imageMogr2/thumbnail/70x70"
                            alt="望京小腰（西三旗店）" width="70" height="70">
                            <span>
                                30 分钟
                            </span>
                        </div>
                        <div class="rstblock-content">
                            <div class="rstblock-title">
                                望京小腰（西三旗店）
                            </div>
                            <div class="starrating icon-star">
                                <span class="icon-star" style="width:0%;">
                                </span>
                            </div>
                            <span class="rstblock-monthsales">
                                月售1单
                            </span>
                            <div class="rstblock-cost">
                                配送费¥9
                            </div>
                            <div class="rstblock-activity">
                                <i style="background:#E75959;">
                                    新
                                </i>
                                <i style="background:#fff;color:#999999;border:1px solid;padding:0;">
                                    保
                                </i>
                            </div>
                        </div>
                    </a>
                    <a class="rstblock" href="javascript:;" data-rst-id="150113809" data-bidding=""
                    target="_blank">
                        <div class="rstblock-logo">
                            <img class="rstblock-logo-icon" src="//fuss10.elemecdn.com/c/60/1223f3dd5e37ad4912b16de03580bpng.png?imageMogr2/thumbnail/70x70"
                            alt="叮当快药(北京市回龙观)" width="70" height="70">
                            <span>
                                39 分钟
                            </span>
                        </div>
                        <div class="rstblock-content">
                            <div class="rstblock-title">
                                叮当快药(北京市回龙观)
                            </div>
                            <div class="starrating icon-star">
                                <span class="icon-star" style="width:94%;">
                                </span>
                            </div>
                            <span class="rstblock-monthsales">
                                月售497单
                            </span>
                            <div class="rstblock-cost">
                                免配送费
                            </div>
                            <div class="rstblock-activity">
                            </div>
                        </div>
                    </a>
                    <a class="rstblock" href="javascript:;" data-rst-id="26547" data-bidding=""
                    target="_blank">
                        <div class="rstblock-logo">
                            <img class="rstblock-logo-icon" src="//fuss10.elemecdn.com/7/44/d4a8483f13bd84289ed1ff85bd21bpng.png?imageMogr2/thumbnail/70x70"
                            alt="极速汉堡（极速食客）" width="70" height="70">
                            <span>
                                38 分钟
                            </span>
                        </div>
                        <div class="rstblock-content">
                            <div class="rstblock-title">
                                极速汉堡（极速食客）
                            </div>
                            <div class="starrating icon-star">
                                <span class="icon-star" style="width:92%;">
                                </span>
                            </div>
                            <span class="rstblock-monthsales">
                                月售6293单
                            </span>
                            <div class="rstblock-cost">
                                配送费¥36
                            </div>
                            <div class="rstblock-activity">
                                <i style="background:#fff;color:#999999;border:1px solid;padding:0;">
                                    票
                                </i>
                            </div>
                        </div>
                    </a>
                    <a class="rstblock" href="javascript:;" data-rst-id="894845" data-bidding=""
                    target="_blank">
                        <div class="rstblock-logo">
                            <img class="rstblock-logo-icon" src="//fuss10.elemecdn.com/3/13/01df4cdbc4e412c6c9e21704303dbjpeg.jpeg?imageMogr2/thumbnail/70x70"
                            alt="江依林烤串吧" width="70" height="70">
                            <span class="rstblock-left-timeout">
                                45+ 分钟
                            </span>
                        </div>
                        <div class="rstblock-content">
                            <div class="rstblock-title">
                                江依林烤串吧
                            </div>
                            <div class="starrating icon-star">
                                <span class="icon-star" style="width:94%;">
                                </span>
                            </div>
                            <span class="rstblock-monthsales">
                                月售1076单
                            </span>
                            <div class="rstblock-cost">
                                配送费¥13
                            </div>
                            <div class="rstblock-activity">
                            </div>
                        </div>
                    </a>
                    <a class="rstblock" href="javascript:;" data-rst-id="2031362" data-bidding=""
                    target="_blank">
                        <div class="rstblock-logo">
                            <img class="rstblock-logo-icon" src="//fuss10.elemecdn.com/d/e0/2b26b58acb1c4a4018323ba31c9f6jpeg.jpeg?imageMogr2/thumbnail/70x70"
                            alt="快乐星汉堡（上庄店）" width="70" height="70">
                            <span>
                                45 分钟
                            </span>
                        </div>
                        <div class="rstblock-content">
                            <div class="rstblock-title">
                                快乐星汉堡（上庄店）
                            </div>
                            <div class="starrating icon-star">
                                <span class="icon-star" style="width:88%;">
                                </span>
                            </div>
                            <span class="rstblock-monthsales">
                                月售441单
                            </span>
                            <div class="rstblock-cost">
                                配送费¥29
                            </div>
                            <div class="rstblock-activity">
                                <i style="background:#fff;color:#999999;border:1px solid;padding:0;">
                                    票
                                </i>
                            </div>
                        </div>
                    </a>
                    <a class="rstblock" href="javascript:;" data-rst-id="774508" data-bidding=""
                    target="_blank">
                        <div class="rstblock-logo">
                            <img class="rstblock-logo-icon" src="//fuss10.elemecdn.com/4/61/ac96f50d5aa520980f2db54d57608jpeg.jpeg?imageMogr2/thumbnail/70x70"
                            alt="夜来香烤翅吧" width="70" height="70">
                            <span class="rstblock-left-timeout">
                                45+ 分钟
                            </span>
                        </div>
                        <div class="rstblock-content">
                            <div class="rstblock-title">
                                夜来香烤翅吧
                            </div>
                            <div class="starrating icon-star">
                                <span class="icon-star" style="width:94%;">
                                </span>
                            </div>
                            <span class="rstblock-monthsales">
                                月售337单
                            </span>
                            <div class="rstblock-cost">
                                配送费¥88
                            </div>
                            <div class="rstblock-activity">
                                <i style="background:#fff;color:#999999;border:1px solid;padding:0;">
                                    票
                                </i>
                            </div>
                        </div>
                    </a>
                    <a class="rstblock" href="javascript:;" data-rst-id="155291958" data-bidding=""
                    target="_blank">
                        <div class="rstblock-logo">
                            <img class="rstblock-logo-icon" src="//fuss10.elemecdn.com/a/f4/84b2d44fff5f0b10f8f79fb4c87e3png.png?imageMogr2/thumbnail/70x70"
                            alt="蛙辣哇啦（苹果园店）" width="70" height="70">
                            <span>
                                38 分钟
                            </span>
                        </div>
                        <div class="rstblock-content">
                            <div class="rstblock-title">
                                蛙辣哇啦（苹果园店）
                            </div>
                            <div class="starrating icon-star">
                                <span class="icon-star" style="width:90%;">
                                </span>
                            </div>
                            <span class="rstblock-monthsales">
                                月售232单
                            </span>
                            <div class="rstblock-cost">
                                配送费¥55
                            </div>
                            <div class="rstblock-activity">
                                <i style="background:#fff;color:#999999;border:1px solid;padding:0;">
                                    票
                                </i>
                            </div>
                        </div>
                    </a>
                    <a class="rstblock" href="javascript:;" data-rst-id="155779267" data-bidding=""
                    target="_blank">
                        <div class="rstblock-logo">
                            <img class="rstblock-logo-icon" src="//fuss10.elemecdn.com/8/05/90c048f89396d2542f7a7e9848a05jpeg.jpeg?imageMogr2/thumbnail/70x70"
                            alt="小渔山" width="70" height="70">
                        </div>
                        <div class="rstblock-content">
                            <div class="rstblock-title">
                                小渔山
                            </div>
                            <div class="starrating icon-star">
                                <span class="icon-star" style="width:84%;">
                                </span>
                            </div>
                            <span class="rstblock-monthsales">
                                月售11单
                            </span>
                            <div class="rstblock-cost">
                                配送费¥50
                            </div>
                            <div class="rstblock-activity">
                                <i style="background:#fff;color:#999999;border:1px solid;padding:0;">
                                    票
                                </i>
                            </div>
                        </div>
                    </a>
                    <a class="rstblock" href="javascript:;" data-rst-id="617230" data-bidding=""
                    target="_blank">
                        <div class="rstblock-logo">
                            <img class="rstblock-logo-icon" src="//fuss10.elemecdn.com/0/d0/7caedd8e64e245c8a8237a5ea6db3png.png?imageMogr2/thumbnail/70x70"
                            alt="哆啦A梦吃货店（西直门店）" width="70" height="70">
                            <span class="rstblock-left-timeout">
                                45+ 分钟
                            </span>
                        </div>
                        <div class="rstblock-content">
                            <div class="rstblock-title">
                                哆啦A梦吃货店（西直门店）
                            </div>
                            <div class="starrating icon-star">
                                <span class="icon-star" style="width:70%;">
                                </span>
                            </div>
                            <span class="rstblock-monthsales">
                                月售46单
                            </span>
                            <div class="rstblock-cost">
                                配送费¥10
                            </div>
                            <div class="rstblock-activity">
                            </div>
                        </div>
                    </a>
                    <a class="rstblock" href="javascript:;" data-rst-id="155127911" data-bidding=""
                    target="_blank">
                        <div class="rstblock-logo">
                            <img class="rstblock-logo-icon" src="//fuss10.elemecdn.com/1/b5/cf919e51dcc08849b9510767be23cjpeg.jpeg?imageMogr2/thumbnail/70x70"
                            alt="若谷草堂（青年路店）" width="70" height="70">
                            <span class="rstblock-left-timeout">
                                45+ 分钟
                            </span>
                        </div>
                        <div class="rstblock-content">
                            <div class="rstblock-title">
                                若谷草堂（青年路店）
                            </div>
                            <div class="starrating icon-star">
                                <span class="icon-star" style="width:100%;">
                                </span>
                            </div>
                            <span class="rstblock-monthsales">
                                月售90单
                            </span>
                            <div class="rstblock-cost">
                                免配送费
                            </div>
                            <div class="rstblock-activity">
                            </div>
                        </div>
                    </a>
                    <a class="rstblock" href="javascript:;" data-rst-id="714542" data-bidding=""
                    target="_blank">
                        <div class="rstblock-logo">
                            <img class="rstblock-logo-icon" src="//fuss10.elemecdn.com/0/10/85ddbadb82faec8da8dcce8d86b11png.png?imageMogr2/thumbnail/70x70"
                            alt="老李囊坑烤羊排" width="70" height="70">
                            <span class="rstblock-left-timeout">
                                45+ 分钟
                            </span>
                        </div>
                        <div class="rstblock-content">
                            <div class="rstblock-title">
                                老李囊坑烤羊排
                            </div>
                            <div class="starrating icon-star">
                                <span class="icon-star" style="width:98%;">
                                </span>
                            </div>
                            <span class="rstblock-monthsales">
                                月售278单
                            </span>
                            <div class="rstblock-cost">
                                配送费¥45
                            </div>
                            <div class="rstblock-activity">
                                <i style="background:#fff;color:#999999;border:1px solid;padding:0;">
                                    票
                                </i>
                            </div>
                        </div>
                    </a>
                    <a class="rstblock" href="javascript:;" data-rst-id="271908" data-bidding=""
                    target="_blank">
                        <div class="rstblock-logo">
                            <img class="rstblock-logo-icon" src="//fuss10.elemecdn.com/f/2c/a00bf6cc2c74eb90099f3d51a8700jpeg.jpeg?imageMogr2/thumbnail/70x70"
                            alt="光明超市" width="70" height="70">
                            <span>
                                37 分钟
                            </span>
                        </div>
                        <div class="rstblock-content">
                            <div class="rstblock-title">
                                光明超市
                            </div>
                            <div class="starrating icon-star">
                                <span class="icon-star" style="width:92%;">
                                </span>
                            </div>
                            <span class="rstblock-monthsales">
                                月售2391单
                            </span>
                            <div class="rstblock-cost">
                                配送费¥50
                            </div>
                            <div class="rstblock-activity">
                                <i style="background:#fff;color:#999999;border:1px solid;padding:0;">
                                    票
                                </i>
                            </div>
                        </div>
                    </a>
                    <a class="rstblock" href="javascript:;" data-rst-id="910315" data-bidding=""
                    target="_blank">
                        <div class="rstblock-logo">
                            <img class="rstblock-logo-icon" src="//fuss10.elemecdn.com/1/d4/06d438d4c1cea3186645d17e3d657jpeg.jpeg?imageMogr2/thumbnail/70x70"
                            alt="香口鱼" width="70" height="70">
                            <span>
                                42 分钟
                            </span>
                        </div>
                        <div class="rstblock-content">
                            <div class="rstblock-title">
                                香口鱼
                            </div>
                            <div class="starrating icon-star">
                                <span class="icon-star" style="width:78%;">
                                </span>
                            </div>
                            <span class="rstblock-monthsales">
                                月售114单
                            </span>
                            <div class="rstblock-cost">
                                配送费¥40
                            </div>
                            <div class="rstblock-activity">
                                <i style="background:#fff;color:#999999;border:1px solid;padding:0;">
                                    票
                                </i>
                            </div>
                        </div>
                    </a>
                    <a class="rstblock" href="javascript:;" data-rst-id="1910967" data-bidding=""
                    target="_blank">
                        <div class="rstblock-logo">
                            <img class="rstblock-logo-icon" src="//fuss10.elemecdn.com/3/01/5d409ee3170b3734ae2912a775a54png.png?imageMogr2/thumbnail/70x70"
                            alt="蛙辣蛙啦" width="70" height="70">
                            <span class="rstblock-left-timeout">
                                45+ 分钟
                            </span>
                        </div>
                        <div class="rstblock-content">
                            <div class="rstblock-title">
                                蛙辣蛙啦
                            </div>
                            <div class="starrating icon-star">
                                <span class="icon-star" style="width:100%;">
                                </span>
                            </div>
                            <span class="rstblock-monthsales">
                                月售271单
                            </span>
                            <div class="rstblock-cost">
                                配送费¥45
                            </div>
                            <div class="rstblock-activity">
                                <i style="background:#fff;color:#999999;border:1px solid;padding:0;">
                                    票
                                </i>
                            </div>
                        </div>
                    </a>
                    <a class="rstblock" href="javascript:;" data-rst-id="1305315" data-bidding=""
                    target="_blank">
                        <div class="rstblock-logo">
                            <img class="rstblock-logo-icon" src="//fuss10.elemecdn.com/c/9f/7b5db671d222ca3792e6cd2e27316png.png?imageMogr2/thumbnail/70x70"
                            alt="呱呱叫馋嘴蛙" width="70" height="70">
                            <span>
                                36 分钟
                            </span>
                        </div>
                        <div class="rstblock-content">
                            <div class="rstblock-title">
                                呱呱叫馋嘴蛙
                            </div>
                            <div class="starrating icon-star">
                                <span class="icon-star" style="width:84%;">
                                </span>
                            </div>
                            <span class="rstblock-monthsales">
                                月售131单
                            </span>
                            <div class="rstblock-cost">
                                配送费¥30
                            </div>
                            <div class="rstblock-activity">
                            </div>
                        </div>
                    </a>
                    <a class="rstblock" href="javascript:;" data-rst-id="154371695" data-bidding=""
                    target="_blank">
                        <div class="rstblock-logo">
                            <img class="rstblock-logo-icon" src="//fuss10.elemecdn.com/c/8f/af842bffa841b4a98a6ac6a21312bpng.png?imageMogr2/thumbnail/70x70"
                            alt="非尝不可小龙虾海鲜" width="70" height="70">
                            <span>
                                38 分钟
                            </span>
                        </div>
                        <div class="rstblock-content">
                            <div class="rstblock-title">
                                非尝不可小龙虾海鲜
                            </div>
                            <div class="starrating icon-star">
                                <span class="icon-star" style="width:92%;">
                                </span>
                            </div>
                            <span class="rstblock-monthsales">
                                月售903单
                            </span>
                            <div class="rstblock-cost">
                                配送费¥60
                            </div>
                            <div class="rstblock-activity">
                            </div>
                        </div>
                    </a>
                    <a class="rstblock" href="javascript:;" data-rst-id="1346489" data-bidding=""
                    target="_blank">
                        <div class="rstblock-logo">
                            <img class="rstblock-logo-icon" src="//fuss10.elemecdn.com/e/c6/6ac01b5619ad9fab6afba4585328bjpeg.jpeg?imageMogr2/thumbnail/70x70"
                            alt="宽板凳老灶火锅" width="70" height="70">
                            <span class="rstblock-left-timeout">
                                45+ 分钟
                            </span>
                        </div>
                        <div class="rstblock-content">
                            <div class="rstblock-title">
                                宽板凳老灶火锅
                            </div>
                            <div class="starrating icon-star">
                                <span class="icon-star" style="width:84%;">
                                </span>
                            </div>
                            <span class="rstblock-monthsales">
                                月售157单
                            </span>
                            <div class="rstblock-cost">
                                配送费¥70
                            </div>
                            <div class="rstblock-activity">
                                <i style="background:#fff;color:#999999;border:1px solid;padding:0;">
                                    票
                                </i>
                            </div>
                        </div>
                    </a>
                    <a class="rstblock" href="javascript:;" data-rst-id="154885119" data-bidding=""
                    target="_blank">
                        <div class="rstblock-logo">
                            <img class="rstblock-logo-icon" src="//fuss10.elemecdn.com/8/bc/adaec8aed92d884e729ef3e1d19f2png.png?imageMogr2/thumbnail/70x70"
                            alt="嘉陵楼馋嘴城（簋街店）" width="70" height="70">
                            <span>
                                38 分钟
                            </span>
                        </div>
                        <div class="rstblock-content">
                            <div class="rstblock-title">
                                嘉陵楼馋嘴城（簋街店）
                            </div>
                            <div class="starrating icon-star">
                                <span class="icon-star" style="width:94%;">
                                </span>
                            </div>
                            <span class="rstblock-monthsales">
                                月售117单
                            </span>
                            <div class="rstblock-cost">
                                配送费¥46
                            </div>
                            <div class="rstblock-activity">
                            </div>
                        </div>
                    </a>
                    <a class="rstblock" href="javascript:;" data-rst-id="609562" data-bidding=""
                    target="_blank">
                        <div class="rstblock-logo">
                            <img class="rstblock-logo-icon" src="//fuss10.elemecdn.com/c/c5/338e183a86d3dbaadbb67794d4cbejpeg.jpeg?imageMogr2/thumbnail/70x70"
                            alt="独门冲小龙虾" width="70" height="70">
                            <span>
                                44 分钟
                            </span>
                        </div>
                        <div class="rstblock-content">
                            <div class="rstblock-title">
                                独门冲小龙虾
                            </div>
                            <div class="starrating icon-star">
                                <span class="icon-star" style="width:92%;">
                                </span>
                            </div>
                            <span class="rstblock-monthsales">
                                月售72单
                            </span>
                            <div class="rstblock-cost">
                                配送费¥40
                            </div>
                            <div class="rstblock-activity">
                            </div>
                        </div>
                    </a>
                    <a class="rstblock" href="javascript:;" data-rst-id="910226" data-bidding=""
                    target="_blank">
                        <div class="rstblock-logo">
                            <img class="rstblock-logo-icon" src="//fuss10.elemecdn.com/c/88/85ab8a34b94f8a717fcd448b323dbjpeg.jpeg?imageMogr2/thumbnail/70x70"
                            alt="簋街红鬼龙虾" width="70" height="70">
                        </div>
                        <div class="rstblock-content">
                            <div class="rstblock-title">
                                簋街红鬼龙虾
                            </div>
                            <div class="starrating icon-star">
                                <span class="icon-star" style="width:72%;">
                                </span>
                            </div>
                            <span class="rstblock-monthsales">
                                月售49单
                            </span>
                            <div class="rstblock-cost">
                                配送费¥50
                            </div>
                            <div class="rstblock-activity">
                                <i style="background:#fff;color:#999999;border:1px solid;padding:0;">
                                    票
                                </i>
                            </div>
                        </div>
                    </a>
                    <a class="rstblock" href="javascript:;" data-rst-id="1908765" data-bidding=""
                    target="_blank">
                        <div class="rstblock-logo">
                            <img class="rstblock-logo-icon" src="//fuss10.elemecdn.com/2/a3/9ae7f1a36ab32684d44ff6aa70c64png.png?imageMogr2/thumbnail/70x70"
                            alt="帝王鸡" width="70" height="70">
                            <span class="rstblock-left-timeout">
                                45+ 分钟
                            </span>
                        </div>
                        <div class="rstblock-content">
                            <div class="rstblock-title">
                                帝王鸡
                            </div>
                            <div class="starrating icon-star">
                                <span class="icon-star" style="width:82%;">
                                </span>
                            </div>
                            <span class="rstblock-monthsales">
                                月售77单
                            </span>
                            <div class="rstblock-cost">
                                配送费¥55
                            </div>
                            <div class="rstblock-activity">
                            </div>
                        </div>
                    </a>
                    <a class="rstblock" href="javascript:;" data-rst-id="2077146" data-bidding=""
                    target="_blank">
                        <div class="rstblock-logo">
                            <img class="rstblock-logo-icon" src="//fuss10.elemecdn.com/0/aa/31408745fd0e03c57e01eac244a6apng.png?imageMogr2/thumbnail/70x70"
                            alt="阿里烧烤私房菜" width="70" height="70">
                            <span>
                                29 分钟
                            </span>
                        </div>
                        <div class="rstblock-content">
                            <div class="rstblock-title">
                                阿里烧烤私房菜
                            </div>
                            <div class="starrating icon-star">
                                <span class="icon-star" style="width:96%;">
                                </span>
                            </div>
                            <span class="rstblock-monthsales">
                                月售74单
                            </span>
                            <div class="rstblock-cost">
                                配送费¥39
                            </div>
                            <div class="rstblock-activity">
                            </div>
                        </div>
                    </a>
                    <a class="rstblock" href="javascript:;" data-rst-id="150974975" data-bidding=""
                    target="_blank">
                        <div class="rstblock-logo">
                            <img class="rstblock-logo-icon" src="//fuss10.elemecdn.com/d/61/47c6503a9582885720ace4eaa404cpng.png?imageMogr2/thumbnail/70x70"
                            alt="楼下有虾（总店）" width="70" height="70">
                        </div>
                        <div class="rstblock-content">
                            <div class="rstblock-title">
                                楼下有虾（总店）
                            </div>
                            <div class="starrating icon-star">
                                <span class="icon-star" style="width:94%;">
                                </span>
                            </div>
                            <span class="rstblock-monthsales">
                                月售58单
                            </span>
                            <div class="rstblock-cost">
                                配送费¥60
                            </div>
                            <div class="rstblock-activity">
                                <i style="background:#fff;color:#999999;border:1px solid;padding:0;">
                                    票
                                </i>
                            </div>
                        </div>
                    </a>
                    <a class="rstblock" href="javascript:;" data-rst-id="412537" data-bidding=""
                    target="_blank">
                        <div class="rstblock-logo">
                            <img class="rstblock-logo-icon" src="//fuss10.elemecdn.com/e/97/7714c0f74738f7c20fc590083cb6cjpeg.jpeg?imageMogr2/thumbnail/70x70"
                            alt="秘制家小龙虾" width="70" height="70">
                            <span>
                                33 分钟
                            </span>
                        </div>
                        <div class="rstblock-content">
                            <div class="rstblock-title">
                                秘制家小龙虾
                            </div>
                            <div class="starrating icon-star">
                                <span class="icon-star" style="width:92%;">
                                </span>
                            </div>
                            <span class="rstblock-monthsales">
                                月售79单
                            </span>
                            <div class="rstblock-cost">
                                免配送费
                            </div>
                            <div class="rstblock-activity">
                            </div>
                        </div>
                    </a>
                    <a class="rstblock" href="javascript:;" data-rst-id="617230" data-bidding=""
                    target="_blank">
                        <div class="rstblock-logo">
                            <img class="rstblock-logo-icon" src="//fuss10.elemecdn.com/0/d0/7caedd8e64e245c8a8237a5ea6db3png.png?imageMogr2/thumbnail/70x70"
                            alt="哆啦A梦吃货店（西直门店）" width="70" height="70">
                            <span class="rstblock-left-timeout">
                                45+ 分钟
                            </span>
                        </div>
                        <div class="rstblock-content">
                            <div class="rstblock-title">
                                哆啦A梦吃货店（西直门店）
                            </div>
                            <div class="starrating icon-star">
                                <span class="icon-star" style="width:70%;">
                                </span>
                            </div>
                            <span class="rstblock-monthsales">
                                月售46单
                            </span>
                            <div class="rstblock-cost">
                                配送费¥10
                            </div>
                            <div class="rstblock-activity">
                            </div>
                        </div>
                    </a>
                    <a class="rstblock" href="javascript:;" data-rst-id="609562" data-bidding=""
                    target="_blank">
                        <div class="rstblock-logo">
                            <img class="rstblock-logo-icon" src="//fuss10.elemecdn.com/c/c5/338e183a86d3dbaadbb67794d4cbejpeg.jpeg?imageMogr2/thumbnail/70x70"
                            alt="独门冲小龙虾" width="70" height="70">
                            <span>
                                44 分钟
                            </span>
                        </div>
                        <div class="rstblock-content">
                            <div class="rstblock-title">
                                独门冲小龙虾
                            </div>
                            <div class="starrating icon-star">
                                <span class="icon-star" style="width:92%;">
                                </span>
                            </div>
                            <span class="rstblock-monthsales">
                                月售72单
                            </span>
                            <div class="rstblock-cost">
                                配送费¥40
                            </div>
                            <div class="rstblock-activity">
                            </div>
                        </div>
                    </a>
                    <a class="rstblock" href="javascript:;" data-rst-id="150139700" data-bidding=""
                    target="_blank">
                        <div class="rstblock-logo">
                            <img class="rstblock-logo-icon" src="//fuss10.elemecdn.com/4/02/ce11443758a189a407d5f45839c8djpeg.jpeg?imageMogr2/thumbnail/70x70"
                            alt="e果e家" width="70" height="70">
                            <span>
                                29 分钟
                            </span>
                        </div>
                        <div class="rstblock-content">
                            <div class="rstblock-title">
                                e果e家
                            </div>
                            <div class="starrating icon-star">
                                <span class="icon-star" style="width:72%;">
                                </span>
                            </div>
                            <span class="rstblock-monthsales">
                                月售74单
                            </span>
                            <div class="rstblock-cost">
                                配送费¥48
                            </div>
                            <div class="rstblock-activity">
                            </div>
                        </div>
                    </a>
                    <a class="rstblock" href="javascript:;" data-rst-id="155260408" data-bidding=""
                    target="_blank">
                        <div class="rstblock-logo">
                            <img class="rstblock-logo-icon" src="//fuss10.elemecdn.com/c/e1/9a39139a098209ebfffaabf368f8epng.png?imageMogr2/thumbnail/70x70"
                            alt="钳途麻小" width="70" height="70">
                        </div>
                        <div class="rstblock-content">
                            <div class="rstblock-title">
                                钳途麻小
                            </div>
                            <div class="starrating icon-star">
                                <span class="icon-star" style="width:100%;">
                                </span>
                            </div>
                            <span class="rstblock-monthsales">
                                月售84单
                            </span>
                            <div class="rstblock-cost">
                                配送费¥65
                            </div>
                            <div class="rstblock-activity">
                            </div>
                        </div>
                    </a>
                    <a class="rstblock" href="javascript:;" data-rst-id="150886691" data-bidding=""
                    target="_blank">
                        <div class="rstblock-logo">
                            <img class="rstblock-logo-icon" src="//fuss10.elemecdn.com/f/54/516aefa8bc0506afa890d88693626jpeg.jpeg?imageMogr2/thumbnail/70x70"
                            alt="望京小腰" width="70" height="70">
                            <span>
                                35 分钟
                            </span>
                        </div>
                        <div class="rstblock-content">
                            <div class="rstblock-title">
                                望京小腰
                            </div>
                            <div class="starrating icon-star">
                                <span class="icon-star" style="width:100%;">
                                </span>
                            </div>
                            <span class="rstblock-monthsales">
                                月售91单
                            </span>
                            <div class="rstblock-cost">
                                配送费¥40
                            </div>
                            <div class="rstblock-activity">
                            </div>
                        </div>
                    </a>
                    <a class="rstblock" href="javascript:;" data-rst-id="1413712" data-bidding=""
                    target="_blank">
                        <div class="rstblock-logo">
                            <img class="rstblock-logo-icon" src="//fuss10.elemecdn.com/0/fe/eb6496cee7d0d8599025aa1181843jpeg.jpeg?imageMogr2/thumbnail/70x70"
                            alt="小布丁" width="70" height="70">
                        </div>
                        <div class="rstblock-content">
                            <div class="rstblock-title">
                                小布丁
                            </div>
                            <div class="starrating icon-star">
                                <span class="icon-star" style="width:88%;">
                                </span>
                            </div>
                            <span class="rstblock-monthsales">
                                月售37单
                            </span>
                            <div class="rstblock-cost">
                                配送费¥48
                            </div>
                            <div class="rstblock-activity">
                                <i style="background:#fff;color:#999999;border:1px solid;padding:0;">
                                    票
                                </i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="loading ng-binding ng-isolate-scope ng-hide" ng-show="rstStream.status === 'LOADING'"
                loading="" content="正在载入更多商家..." type="normal">
                    <img class="normal ng-scope" ng-if="type==='normal'" src="./img/loading.0e7b2e.gif"
                    alt="正在加载">
                    正在载入更多商家...
                </div>
                <div id="fetchMoreRst" class="">
                    点击加载更多商家...
                </div>
                <div class="place-rstbox-nodata ng-hide" ng-show="rstStream.status === 'COMPLETE' && !filteredRestaurants.length">
                    <img class="nodata" src="./img/icon-restaurant.b3a359.png" alt="找不到商家"
                    width="100">
                    <div class="typo-small">
                        附近没有找到符合条件的商家，换个筛选条件试试吧
                    </div>
                </div>
                </div>
                </div>
                
               
@endsection