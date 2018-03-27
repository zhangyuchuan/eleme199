@extends('Homes.Users.public.public')

@section('title','饿了么-网上订餐_外卖_饿了么订餐官网')

@section('content')

            <h3 ng-if="pageTitleVisible" class="profile-paneltitle ng-scope">
                        <span ng-bind="pageTitle" class="ng-binding">
                            设置密码
                        </span>
                <span class="subtitle ng-binding" ng-bind-html="pageSubtitle | toTrusted">
                        </span>
            </h3>
            <!-- end ngIf: pageTitleVisible -->
            <div class="profile-panelcontent" ng-transclude="">
                <form class="changepwd ng-scope ng-pristine ng-valid" ng-submit="changePwdSubmit()"
                      novalidate="">
                    <p class="changepwd-tip">
                        饿了么提示你：使用大小写字母、数字与标点符号的组合，可以大幅提升帐号安全！
                    </p>
                    <!-- ngIf: !firstSet -->
                    <div class="formfield ng-isolate-scope" ng-class="{ &#39;validate-error&#39;: model.$hintTypes[property] === &#39;error&#39; }"
                         form-field="" label="新密码" model="changePwdData" property="newPwd">
                        <label ng-bind="label" class="ng-binding">
                            新密码
                        </label>
                        <input type="password" name="newPwd" ng-model="changePwdData.newPwd" placeholder="请输入新密码"
                               class="ng-scope ng-pristine ng-valid">
                        <div class="formfield-hint">
                                    <span ng-class="{ &#39;icon-dot-error&#39;: model.$hintTypes[property] === &#39;error&#39;, &#39;icon-dot-warning&#39;: model.$hintTypes[property] === &#39;warning&#39; }"
                                          ng-bind="model.$hints[property]" class="ng-binding">
                                    </span>
                        </div>
                    </div>
                    <div class="formfield ng-isolate-scope" ng-class="{ &#39;validate-error&#39;: model.$hintTypes[property] === &#39;error&#39; }"
                         form-field="" label="确认密码" model="changePwdData" property="confirmPwd">
                        <label ng-bind="label" class="ng-binding">
                            确认密码
                        </label>
                        <input type="password" name="confirm" ng-model="changePwdData.confirmPwd"
                               placeholder="请再次输入密码" class="ng-scope ng-pristine ng-valid">
                        <div class="formfield-hint">
                                    <span ng-class="{ &#39;icon-dot-error&#39;: model.$hintTypes[property] === &#39;error&#39;, &#39;icon-dot-warning&#39;: model.$hintTypes[property] === &#39;warning&#39; }"
                                          ng-bind="model.$hints[property]" class="ng-binding">
                                    </span>
                        </div>
                    </div>
                    <div class="form-group formfield ng-isolate-scope" ng-class="{ &#39;validate-error&#39;: model.$hintTypes[property] === &#39;error&#39; }"
                         form-field="">
                        <label ng-bind="label" class="ng-binding">
                        </label>
                        <button type="submit" class="btn-primary btn-lg ng-scope">
                            确认
                        </button>
                        <div class="formfield-hint">
                                    <span ng-class="{ &#39;icon-dot-error&#39;: model.$hintTypes[property] === &#39;error&#39;, &#39;icon-dot-warning&#39;: model.$hintTypes[property] === &#39;warning&#39; }"
                                          ng-bind="model.$hints[property]" class="ng-binding">
                                    </span>
                        </div>
                    </div>
                </form>
            </div>

@endsection