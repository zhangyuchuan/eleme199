@extends('Homes.Users.public.public')

@section('title','饿了么-网上订餐_外卖_饿了么订餐官网')

@section('content')

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
                                    <a class="profileinfo-facedit" href="">
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
                                    <a class="profileinfo-link" href="">
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
                                    <a class="profileinfo-link unbind" href="">
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
            {{--</div>--}}


@endsection