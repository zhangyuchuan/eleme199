@extends('Homes.Users.public.public')

@section('title','饿了么-网上订餐_外卖_饿了么订餐官网')

@section('content')

                <div class="security-level ng-scope">
                            <span>
                                安全等级：
                            </span>
                    <div class="security-level-bar">
                                <span class="security-level-progress low" ng-style="{&#39;width&#39;: level.width, &#39;background-color&#39;: level.color}"
                                      style="width: 60%; background-color: rgb(148, 200, 82);">
                                </span>
                    </div>
                    <span class="security-level-text ng-binding" ng-bind="level.text" ng-style="{&#39;color&#39;: level.color}"
                          style="color: rgb(148, 200, 82);">
                                高
                            </span>
                    <span class="security-level-tip">
                                建议你启动全部安全设置，以保障账户及资金安全！
                            </span>
                </div>
                <div class="loading ng-binding ng-isolate-scope ng-hide" loading="" content="正在载入安全信息..."
                     ng-show="securityLoading">
                    <!-- ngIf: type==='profile' -->
                    <img ng-if="type===&#39;profile&#39;" src="./个人中心_安全中心 _ 饿了么网上订餐_files/profile-loading.4984fa.gif"
                         alt="正在加载" class="ng-scope">
                    <!-- end ngIf: type==='profile' -->
                    <!-- ngIf: type==='normal' -->
                    正在载入安全信息...
                </div>
                <!-- ngRepeat: item in securityType -->
                <div class="security-type ng-scope" ng-repeat="item in securityType">
                            <span class="child security-type-icon">
                                <i ng-class="item.status ? &#39;security-type-icon-ok icon-dot-check&#39; : &#39;security-type-icon-warn icon-dot-warning&#39;"
                                   class="security-type-icon-warn icon-dot-warning">
                                </i>
                            </span>
                    <span class="child security-type-name ng-binding security-type-name-weak"
                          ng-class="item.status || &#39;security-type-name-weak&#39;" ng-bind="item.name">
                                登录密码
                            </span>
                    <div class="child security-type-tip">
                        <p ng-bind="item.text.text" class="ng-binding">
                            您还没有设置密码
                        </p>
                        <!-- ngIf: item.text.textMore -->
                        <p class="security-type-tip-more ng-binding ng-scope" ng-if="item.text.textMore"
                           ng-bind-html="item.text.textMore | toTrusted">
                            设置登陆密码，使用饿了么更方便、安全。
                        </p>
                        <!-- end ngIf: item.text.textMore -->
                    </div>
                    <span class="child security-type-linkcon">
                                <a class="security-type-link ng-binding btn-stress" target="" ng-href="/profile/security/changepassword"
                                   ng-class="item.status ? &#39;btn-link&#39; : &#39;btn-stress&#39;" ng-bind="item.text.link"
                                   href="">
                                    设置密码
                                </a>
                            </span>
                </div>
                <!-- end ngRepeat: item in securityType -->
                <div class="security-type ng-scope" ng-repeat="item in securityType">
                            <span class="child security-type-icon">
                                <i ng-class="item.status ? &#39;security-type-icon-ok icon-dot-check&#39; : &#39;security-type-icon-warn icon-dot-warning&#39;"
                                   class="security-type-icon-ok icon-dot-check">
                                </i>
                            </span>
                    <span class="child security-type-name ng-binding" ng-class="item.status || &#39;security-type-name-weak&#39;"
                          ng-bind="item.name">
                                手机验证
                            </span>
                    <div class="child security-type-tip">
                        <p ng-bind="item.text.text" class="ng-binding">
                            已绑定手机 151****2553
                        </p>
                        <!-- ngIf: item.text.textMore -->
                    </div>
                    <span class="child security-type-linkcon">
                                <a class="security-type-link ng-binding btn-link" target="" ng-href="/profile/security/changemobile/"
                                   ng-class="item.status ? &#39;btn-link&#39; : &#39;btn-stress&#39;" ng-bind="item.text.link"
                                   href="">
                                    更改手机
                                </a>
                            </span>
                </div>
                <!-- end ngRepeat: item in securityType -->
                <div class="security-type ng-scope" ng-repeat="item in securityType">
                            <span class="child security-type-icon">
                                <i ng-class="item.status ? &#39;security-type-icon-ok icon-dot-check&#39; : &#39;security-type-icon-warn icon-dot-warning&#39;"
                                   class="security-type-icon-warn icon-dot-warning">
                                </i>
                            </span>
                    <span class="child security-type-name ng-binding security-type-name-weak"
                          ng-class="item.status || &#39;security-type-name-weak&#39;" ng-bind="item.name">
                                邮箱激活
                            </span>
                    <div class="child security-type-tip">
                        <p ng-bind="item.text.text" class="ng-binding">
                            您还没有绑定邮箱
                        </p>
                        <!-- ngIf: item.text.textMore -->
                        <p class="security-type-tip-more ng-binding ng-scope" ng-if="item.text.textMore"
                           ng-bind-html="item.text.textMore | toTrusted">
                            验证后可用户快速找回密码，接受账户提醒邮件。
                        </p>
                        <!-- end ngIf: item.text.textMore -->
                    </div>
                    <span class="child security-type-linkcon">
                                <a class="security-type-link ng-binding btn-stress" target="" ng-href="/profile/security/bindemail"
                                   ng-class="item.status ? &#39;btn-link&#39; : &#39;btn-stress&#39;" ng-bind="item.text.link"
                                   href="">
                                    立即绑定
                                </a>
                            </span>
                </div>
                <!-- end ngRepeat: item in securityType -->
                <div class="security-type ng-scope" ng-repeat="item in securityType">
                            <span class="child security-type-icon">
                                <i ng-class="item.status ? &#39;security-type-icon-ok icon-dot-check&#39; : &#39;security-type-icon-warn icon-dot-warning&#39;"
                                   class="security-type-icon-ok icon-dot-check">
                                </i>
                            </span>
                    <span class="child security-type-name ng-binding" ng-class="item.status || &#39;security-type-name-weak&#39;"
                          ng-bind="item.name">
                                支付额度
                            </span>
                    <div class="child security-type-tip">
                        <p ng-bind="item.text.text" class="ng-binding">
                            已设定支付额 50 元
                        </p>
                        <!-- ngIf: item.text.textMore -->
                        <p class="security-type-tip-more ng-binding ng-scope" ng-if="item.text.textMore"
                           ng-bind-html="item.text.textMore | toTrusted">
                            如果当日在线订餐金额超出支付额度，手机验证后才可以付款。
                        </p>
                        <!-- end ngIf: item.text.textMore -->
                    </div>
                    <span class="child security-type-linkcon">
                                <a class="security-type-link ng-binding btn-link" target="" ng-href="/profile/security/modifypay"
                                   ng-class="item.status ? &#39;btn-link&#39; : &#39;btn-stress&#39;" ng-bind="item.text.link"
                                   href="">
                                    更改额度
                                </a>
                            </span>
                </div>
                <!-- end ngRepeat: item in securityType -->

@endsection
