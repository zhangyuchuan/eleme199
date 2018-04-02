@extends('Admin.Common.Common')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
    <div class="x-body">
        <form class="layui-form">
            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="layui-form-item">
                <label for="L_username" class="layui-form-label">
                    用户名
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="L_username" name="username" disabled="" value="{{$user->username}}" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
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
    <script>
        layui.use(['form','layer'], function(){
            $ = layui.jquery;
            var form = layui.form
                ,layer = layui.layer;
            form.verify({
                newpass: [/^[\S]{4,16}$/,'密码必须4到16位，且不能出现空格'],
                repass: function(value){
                    if(jQuery('#L_pass').val()!=jQuery('#N_repass').val()){
                        return '两次密码不一致';
                    }
                }
            });
            //监听提交
            form.on('submit(save)', function(data){
                var id = $('input[type=hidden]').val();
                // console.log(id);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:'/admin/users/manger/dorepass/'+id,
                    data:data.field,
                    dataType:'json',
                    type:'post',
                    success:function(data){
                        if(data.status=='1'){
                            layer.alert(data.msg,{icon:5,time:2000},function() {
                                //关闭弹层，刷新父页面
                                // parent.location.reload(true);
                            })
                        }else{
                            layer.alert(data.msg,{icon:6,time:2000},function() {
                                //关闭弹层，刷新父页面
                                // parent.location.reload(true);
                                var index = parent.layer.getFrameIndex(window.name);
                                parent.layer.close(index);
                            })
                        }

                    },
                    timeout:3000,
                    async:true
                })
                return false;
            });


        });
    </script>
    <script>var _hmt = _hmt || []; (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();</script>
@endsection