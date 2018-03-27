@extends('Homes.Users.public.public')

@section('title','饿了么-网上订餐_外卖_饿了么订餐官网')

@section('content')

            <h3 ng-if="pageTitleVisible" class="profile-paneltitle ng-scope">
                        <span ng-bind="pageTitle" class="ng-binding">
                            地址管理
                        </span>
                <span class="subtitle ng-binding" ng-bind-html="pageSubtitle | toTrusted">
                        </span>
            </h3>
            <!-- end ngIf: pageTitleVisible -->
            <div class="profile-panelcontent" ng-transclude="">
                <div class="loading ng-binding ng-isolate-scope ng-hide" loading="" content="正在载入地址..."
                     ng-show="addressLoading">
                    <!-- ngIf: type==='profile' -->
                    <img ng-if="type===&#39;profile&#39;" src="./个人中心_地址管理 _ 饿了么网上订餐_files/profile-loading.4984fa.gif"
                         alt="正在加载" class="ng-scope">
                    <!-- end ngIf: type==='profile' -->
                    <!-- ngIf: type==='normal' -->
                    正在载入地址...
                </div>
                <div class="desktop-addresslist clearfix ng-scope" ng-hide="addressLoading">
                    <!-- ngRepeat: address in userAddresses -->
                    <div class="desktop-addressblock ng-scope" ng-repeat="address in userAddresses">
                        <div class="desktop-addressblock-buttons">
                            <button class="desktop-addressblock-button" ng-click="editAddress(address)">
                                修改
                            </button>
                            <button class="desktop-addressblock-button" ng-click="showMask = true">
                                删除
                            </button>
                        </div>
                        <div class="desktop-addressblock-name ng-binding">
                            陈
                            <span class="ng-binding">
                                        先生
                                    </span>
                        </div>
                        <div class="desktop-addressblock-address ng-binding" ng-bind="address.address + &#39; &#39; + address.address_detail">
                            赛格电脑城 黄河路2楼凯尼科技
                        </div>
                        <div class="desktop-addressblock-mobile ng-binding" ng-bind="address.phone">
                            15139802553
                        </div>
                        <div class="desktop-addressblock-mask ng-hide" ng-show="showMask">
                        </div>
                        <!-- ngIf: !address.st_geohash || !address.address -->
                        <div class="desktop-addressblock-removebuttons ng-hide" ng-show="showMask">
                            <p>
                                确定删除收货地址?
                            </p>
                            <button class="confirmdelete" ng-click="removeAddress(address)">
                                确定
                            </button>
                            <button class="canceldelete" ng-click="showMask = false">
                                取消
                            </button>
                        </div>
                    </div>
                    <!-- end ngRepeat: address in userAddresses -->
                    <button class="desktop-addressblock desktop-addressblock-addblock" ng-click="addAddress()">
                        <i class="icon-plus">
                        </i>
                        添加新地址
                    </button>
                </div>
            </div>

@endsection