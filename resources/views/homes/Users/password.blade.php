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
                <form class="changepwd ng-scope ng-pristine ng-valid" action="/repass" method="post" >
                    {{csrf_field()}}

                    <p class="changepwd-tip">
                        饿了么提示你：使用大小写字母、数字与标点符号的组合，可以大幅提升帐号安全！
                    </p>
                    {{--<!-- ngIf: !firstSet -->--}}
                    {{--<div class="formfield ng-isolate-scope"--}}
                         {{--form-field="" label="原密码" model="changePwdData" property="newPwd">--}}
                        {{--<label ng-bind="label" class="ng-binding">--}}
                            {{--原密码--}}
                        {{--</label>--}}
                        {{--<input type="password" id="old_pass" name="oldpass" required="" lay-verify="oldpass" placeholder="请输入原密码"--}}
                               {{--autocomplete="off" class="layui-input">--}}
                        {{--<div class="formfield-hint">--}}
                                    {{--<span ng-class="{ &#39;icon-dot-error&#39;: model.$hintTypes[property] === &#39;error&#39;, &#39;icon-dot-warning&#39;: model.$hintTypes[property] === &#39;warning&#39; }"--}}
                                          {{--ng-bind="model.$hints[property]" class="ng-binding">--}}
                                    {{--</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="formfield ng-isolate-scope" ng-class="{ &#39;validate-error&#39;: model.$hintTypes[property] === &#39;error&#39; }"--}}
                         {{--form-field="" label="新密码" model="changePwdData" property="newPwd">--}}
                        {{--<label ng-bind="label" class="ng-binding">--}}
                            {{--新密码--}}
                        {{--</label>--}}
                        {{--<input type="password" id="L_pass" name="newpass" required="" lay-verify="newpass" placeholder="请输入新密码"--}}
                               {{--autocomplete="off" class="layui-input">--}}
                        {{--<div class="formfield-hint">--}}
                                    {{--<span ng-class="{ &#39;icon-dot-error&#39;: model.$hintTypes[property] === &#39;error&#39;, &#39;icon-dot-warning&#39;: model.$hintTypes[property] === &#39;warning&#39; }"--}}
                                          {{--ng-bind="model.$hints[property]" class="ng-binding">--}}
                                    {{--</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="formfield ng-isolate-scope" ng-class="{ &#39;validate-error&#39;: model.$hintTypes[property] === &#39;error&#39; }"--}}
                         {{--form-field="" label="确认密码" model="changePwdData" property="confirmPwd">--}}
                        {{--<label ng-bind="label" class="ng-binding">--}}
                            {{--确认密码--}}
                        {{--</label>--}}
                        {{--<input type="password" id="L_repass" name="repass" required="" lay-verify="repass" placeholder="请再次输入新密码"--}}
                               {{--autocomplete="off" class="layui-input">--}}
                        {{--<div class="formfield-hint">--}}
                                    {{--<span ng-class="{ &#39;icon-dot-error&#39;: model.$hintTypes[property] === &#39;error&#39;, &#39;icon-dot-warning&#39;: model.$hintTypes[property] === &#39;warning&#39; }"--}}
                                          {{--ng-bind="model.$hints[property]" class="ng-binding">--}}
                                    {{--</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group formfield ng-isolate-scope" ng-class="{ &#39;validate-error&#39;: model.$hintTypes[property] === &#39;error&#39; }"--}}
                         {{--form-field="">--}}
                        {{--<label ng-bind="label" class="ng-binding">--}}
                        {{--</label>--}}
                        {{--<button  class="btn-primary btn-lg ng-scope " id="bnt1" lay-filter="add" lay-submit="">--}}
                            {{--确认--}}
                        {{--</button>--}}

                        {{--<div class="formfield-hint">--}}
                                    {{--<span ng-class="{ &#39;icon-dot-error&#39;: model.$hintTypes[property] === &#39;error&#39;, &#39;icon-dot-warning&#39;: model.$hintTypes[property] === &#39;warning&#39; }"--}}
                                          {{--ng-bind="model.$hints[property]" class="ng-binding">--}}
                                    {{--</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}
            {{--<script>--}}

                {{--layui.use(['form','layer'], function() {--}}
                    {{--$ = layui.jquery;--}}
                    {{--var form = layui.form--}}
                        {{--, layer = layui.layer;--}}
                    {{--//自定义验证规则--}}
                    {{--form.verify({--}}
                      {{--newpass: [/^[\S]{6,12}$/, '密码必须6到12位']--}}
                        {{--,repass: function(value){--}}
                            {{--if($('#L_pass').val()!=$('#L_repass').val()){--}}
                                {{--return '两次密码不一致';--}}
                            {{--}--}}
                        {{--}--}}
                    {{--});--}}
                    {{--$.post('')--}}
                    {{--$('#bnt1').submit(function(){--}}
                        {{--$.ajax({--}}
                            {{--headers: {--}}
                                {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
                            {{--},--}}
                            {{--url:'/repass/'+1,--}}
                            {{--//layui表单提交--}}
                            {{--data:data.field,--}}
                            {{--dataType:'json',--}}
                            {{--type:'post',--}}
                            {{--success:function(data){--}}

                                {{--if(data.status==1){--}}
                                   {{--alert('修改成功');--}}
                                {{--}else{--}}



                                    {{--alert('修改失败');--}}

                                {{--}--}}
                            {{--}--}}

                        {{--});--}}
                        {{--return false;--}}

                    {{--})--}}
                    {{--//监听提交--}}
                    {{--form.on('submit(add)', function(data){--}}
                        {{--var id= $('input[type=hidden]').val();--}}

                    {{--});--}}
                {{--});--}}
            {{--</script>--}}
            <div  >


                    <div class="layui-form-item" >

                        <input  type="hidden"  name="id"  value="{{ $user->id }}">
                    </div>
                    <div class="layui-form-item" >
                        <label for="L_repass" class="layui-form-label">
                            <span class="x-red">*</span>旧密码
                        </label>
                        <div class="layui-input-inline">
                            <input type="password" id="L_repass" name="oldpass" required="" lay-verify="required"
                                   autocomplete="off" class="layui-input">
                        </div>

                        <div class="layui-form-mid layui-word-aux">
                            请先输入旧密码
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_pass" class="layui-form-label">
                            <span class="x-red">*</span>新密码
                        </label>
                        <div class="layui-input-inline">
                            <input type="password" id="L_pass" name="newpass" required="" lay-verify="newpass"
                                   autocomplete="off" class="layui-input" >
                        </div>
                        <div class="layui-form-mid layui-word-aux">
                            4到16个字符
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="N_repass" class="layui-form-label">
                            <span class="x-red">*</span>确认密码
                        </label>
                        <div class="layui-input-inline">
                            <input type="password" id="N_repass" name="repass" required="" lay-verify="repass"
                                   autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label">
                        </label>
                        <button  class="layui-btn" lay-filter="save" lay-submit="">
                            修改
                        </button>

                    </div>

                </form>
            </div>
            {{--<script>--}}
                {{--layui.use(['form','layer'], function(){--}}
                    {{--$ = layui.jquery;--}}
                    {{--var form = layui.form--}}
                        {{--,layer = layui.layer;--}}
                    {{--form.verify({--}}
                        {{--newpass: [/^[\S]{4,16}$/,'密码必须4到16位，且不能出现空格'],--}}
                        {{--repass: function(value){--}}
                            {{--if(jQuery('#L_pass').val()!=jQuery('#N_repass').val()){--}}
                                {{--return '两次密码不一致';--}}
                            {{--}--}}
                        {{--}--}}
                    {{--});--}}
                    {{--//监听提交--}}
                    {{--form.on('submit(save)', function(data){--}}


                        {{--$.ajax({--}}
                            {{--url:'/repass',--}}
                            {{--data:data.field,--}}
                            {{--dataType:'json',--}}
                            {{--type:'post',--}}
                            {{--success:function(data){--}}

                                {{--if(data.status=='1'){--}}
                                    {{--layer.alert(data.msg,{icon:5,time:2000},function() {--}}
                                        {{--//关闭弹层，刷新父页面--}}
                                        {{--// parent.location.reload(true);--}}
                                    {{--})--}}
                                {{--}else{--}}
                                    {{--layer.alert(data.msg,{icon:6,time:2000},function() {--}}
                                        {{--//关闭弹层，刷新父页面--}}
                                        {{--// parent.location.reload(true);--}}
                                        {{--var index = parent.layer.getFrameIndex(window.name);--}}
                                        {{--parent.layer.close(index);--}}
                                    {{--})--}}
                                {{--}--}}

                            {{--},--}}
                            {{--timeout:3000,--}}
                            {{--async:true--}}
                        {{--})--}}
                        {{--return false;--}}
                    {{--});--}}


                {{--});--}}
            {{--</script>--}}
            {{--<script>var _hmt = _hmt || []; (function() {--}}
                    {{--var hm = document.createElement("script");--}}
                    {{--hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";--}}
                    {{--var s = document.getElementsByTagName("script")[0];--}}
                    {{--s.parentNode.insertBefore(hm, s);--}}
                {{--})();</script>--}}
@endsection