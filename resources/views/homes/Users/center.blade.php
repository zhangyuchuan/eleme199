@extends('Homes.Users.public.public')

@section('title','饿了么-网上订餐_外卖_饿了么订餐官网')

@section('content')

                    <div class="profile-panelcontent" transclude="">
                        <div class="profile-info scope">
                            <div class="profile-infoitem">
                                <div class="profile-avatarwrap">
                                    <img show="avatarUrl" src="//fuss10.elemecdn.com/1/aa/517c48e40061040af3a2b6a96bf94jpeg.jpeg?imageMogr2/thumbnail/112x112/format/webp/quality/85"
                                    alt="seeklegend的头像" class="profile-avatar" src="/home/img/517c48e40061040af3a2b6a96bf94jpeg(1).jpeg"
                                    />
                                    <a href="" class="profile-edit">
                                        编辑资料
                                    </a>
                                </div>
                                <div class="profile-perosondata">
                                    <h3 class="profile-name binding">
                                        夜已深，
                                        <strong class="binding">
                                            seeklegend
                                        </strong>
                                    </h3>
                                    <p class="profile-tips binding" bind="timeSection.tipText">
                                        是不是饿的睡不着呀？吃个夜宵呗！
                                    </p>
                                    <p class="profile-security">
                                        账户安全：
                                        <span class="{'low': level === 0, 'mid': level === 1, 'high': level ===2 || level ===3}"
                                        bind="levelText" class="binding high">
                                            高
                                        </span>
                                        <a href="">
                                            查看详情
                                        </a>
                                    </p>
                                    <p class="profile-othermessage">
                                        <!-- ngIf: user.is_mobile_valid -->
                                        <a href="" class="icon mobile icon-profile-phone scope"
                                        if="user.is_mobile_valid">
                                        </a>
                                        <!-- end ngIf: user.is_mobile_valid -->
                                        <!-- ngIf: user.is_email_valid -->
                                        <!-- ngIf: !user.is_mobile_valid -->
                                        <!-- ngIf: !user.is_email_valid -->
                                        <a href="" class="icon email icon-profile-email none scope"
                                        if="!user.is_email_valid" tooltip="未绑定邮箱">
                                        </a>
                                        <!-- end ngIf: !user.is_email_valid -->
                                    </p>
                                </div>
                            </div>
                            <div class="profile-infoitem">
                                <a class="inherit" href="">
                                    <p>
                                        我的红包
                                    </p>
                                    <p class="profile-infoitem-number hongbao">
                                        <span class="number binding" bind="hongbaocount">
                                            0
                                        </span>
                                        个
                                    </p>
                                </a>
                            </div>
                            <div class="profile-infoitem">
                                <a class="inherit" href="">
                                    <p>
                                        我的积分
                                    </p>
                                    <p class="profile-infoitem-number score">
                                        <span class="number binding" bind="user.point">
                                            0
                                        </span>
                                        分
                                    </p>
                                </a>
                            </div>
                            <div class="profile-infoitem">
                                <a class="inherit" href="">
                                    <p>
                                        账户余额
                                    </p>
                                    <p class="profile-infoitem-number balance">
                                        <span class="number binding" bind="user.balance| number : 2">
                                            0.00
                                        </span>
                                        元
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="profile-order scope">
                            <div class="tabnavigation">
                                <a class="tabnavigation-navitem active">
                                    最近订单
                                </a>
                                <a class="tabnavigation-rightitem profile-allorder" href="">
                                    查看全部订单&gt;
                                </a>
                            </div>
                            <div class="profile-order-content">

                                <!-- ngRepeat: order in recentOrder -->
                                <!-- ngIf: !recentOrder.length && !orderLoading -->
                                <div class="nodata isolate-scope" if="!recentOrder.length &amp;&amp; !orderLoading"
                                nodatatip="" content="你最近没有下过单哦，现在就去&lt;a href='/place'&gt;订餐&lt;/a&gt;吧~">
                                    <p class="nodata-container binding" bind-html="content | toTrusted">
                                        你最近没有下过单哦，现在就去
                                        <a href="">
                                            订餐
                                        </a>
                                        吧~
                                    </p>
                                </div>
                                <!-- end ngIf: !recentOrder.length && !orderLoading -->
                            </div>
                        </div>
                        <div class="profile-footprint scope">
                            <div class="tabnavigation">
                                <a class="tabnavigation-navitem active">
                                    美食足迹
                                </a>
                                <a class="tabnavigation-navitem" href="">
                                    我的收藏
                                </a>
                                <div class="tabnavigation-rightitem scope binding simplepagination"
                                simplepagination="" pagination-context="restaurantContext" show="restaurantContext.data.length">
                                    1/1
                                    <span class="pre-btn icon-profile-left-arrow disable" class="{'disable':currentPage===1}">
                                    </span>
                                    <span class="next-btn icon-profile-right-arrow disable" class="{'disable':currentPage===pageCount}">
                                    </span>
                                </div>
                            </div>
                            <div class="footprint-content clearfix">
                                {{--<p class="nodata-container binding" bind-html="content | toTrusted">--}}
                                    {{--你最近没有下过单哦，现在就去--}}
                                    {{--<a href="">--}}
                                        {{--订餐--}}
                                    {{--</a>--}}
                                    {{--吧~--}}
                                {{--</p>--}}
                                <!-- ngRepeat: restaurant in restaurantContext.pageData -->
                                <a class="noline rstblock isolate-scope" data-rst-id="305969" class="{'rstblock-closed': !restaurant.is_opening || restaurant.in_delivery_area === false}"
                                href="/shop/305969" data-bidding="" target="_blank" repeat="restaurant in restaurantContext.pageData"
                                data="{ $restaurant: restaurant }" href=">
                                    <div class="rstblock-logo">
                                        <img width="70" height="70" class="rstblock-logo-icon" src="//fuss10.elemecdn.com/4/37/c63265e6d69161383973eb8eef609png.png?imageMogr2/thumbnail/70x70"
                                        alt="德克士（雅酷店）" src="/home/img/c63265e6d69161383973eb8eef609png.png"
                                        />
                                        <!-- ngIf: restaurant.order_lead_time_text -->
                                        <span if="restaurant.order_lead_time_text" bind="restaurant.order_lead_time_text + ' 分钟'"
                                        class="{'rstblock-left-timeout': restaurant.order_lead_time_text === '45+'}"
                                        class="binding scope">
                                            42 分钟
                                        </span>
                                        <!-- end ngIf: restaurant.order_lead_time_text -->
                                        <!-- ngIf: restaurant.is_premium -->
                                    </div>
                                    <div class="rstblock-content">
                                        <div class="rstblock-title binding" bind="restaurant.name">
                                            德克士（雅酷店）
                                        </div>
                                        <div class="starrating icon-star">
                                            <span class="icon-star" style="{ width: (restaurant.rating * 20 || 0) + '%' }"
                                            style="width: 96%;">
                                            </span>
                                        </div>
                                        <span class="rstblock-monthsales binding" bind="'月售' + restaurant.recent_order_num + '单'">
                                            月售945单
                                        </span>
                                        <div class="rstblock-cost binding" bind="restaurant.piecewise_agent_fee.tips">
                                            配送费&yen;5
                                        </div>
                                        <!-- ngIf: restaurant.status===1 && restaurant.in_delivery_area !==f alse
                                        -->
                                        <div if="restaurant.status === 1 &amp;&amp; restaurant.in_delivery_area !== false"
                                        class="rstblock-activity scope">
                                            <!-- ngRepeat: activity in restaurant.activities | limitTo: 8 -->
                                            <!-- ngIf: activity.type===' supprots' -->
                                            <!-- end ngRepeat: activity in restaurant.activities | limitTo: 8 -->
                                            <!-- ngIf: activity.type===' supprots' -->
                                            <!-- end ngRepeat: activity in restaurant.activities | limitTo: 8 -->
                                            <!-- ngRepeat: activity in restaurant.activities | limitTo: 8 -->
                                            <!-- ngIf: activity.type !==' supprots' -->
                                            <i repeat="activity in restaurant.activities | limitTo: 8" bind="activity.icon_name"
                                            style="activity.style" if="activity.type !== 'supprots'" class="binding scope"
                                            style="background: rgb(87, 169, 255);">
                                                准
                                            </i>
                                            <!-- end ngIf: activity.type !==' supprots' -->
                                            <!-- end ngRepeat: activity in restaurant.activities | limitTo: 8 -->
                                            <!-- ngIf: activity.type !==' supprots' -->
                                            <i repeat="activity in restaurant.activities | limitTo: 8" bind="activity.icon_name"
                                            style="activity.style" if="activity.type !== 'supprots'" class="binding scope"
                                            style="color: rgb(153, 153, 153); border: 1px solid; padding: 0px; background: rgb(255, 255, 255);">
                                                保
                                            </i>
                                            <!-- end ngIf: activity.type !==' supprots' -->
                                            <!-- end ngRepeat: activity in restaurant.activities | limitTo: 8 -->
                                        </div>
                                        <!-- end ngIf: restaurant.status===1 && restaurant.in_delivery_area !==f
                                        alse -->
                                        <!-- ngIf: restaurant.in_delivery_area===f alse -->
                                        <!-- ngIf: !restaurant.is_opening && restaurant.in_delivery_area !==f
                                        alse -->
                                        <!-- ngIf: restaurant.status===5 && restaurant.in_delivery_area !==f alse
                                        -->
                                        <!-- ngIf: (restaurant.status===3 || restaurant.status===6 ) && restaurant.in_delivery_area
                                        !==f alse -->
                                    </div>
                                </a>
                                <!-- end ngRepeat: restaurant in restaurantContext.pageData -->
                                <!-- ngIf: !restaurantContext.pageData.length && !footDateLoading -->
                            </div>
                        </div>

@endsection