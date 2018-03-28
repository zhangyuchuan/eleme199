@extends('Admin.Common.Common')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
    <div class="x-body">
        <form class="layui-form" >
            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="layui-form-item">
                <label for="username" class="layui-form-label">
                    <span class="x-red">*</span>用户名
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="username" name="username" required="" lay-verify="username"
                           autocomplete="off" class="layui-input" value="{{$user->username}}">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>4~16位
                </div>
            </div>
            <div class="layui-form-item">
                <label for="phone" class="layui-form-label">
                    <span class="x-red">*</span>手机
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="phone" name="phone" required="" lay-verify="phone"
                           autocomplete="off" class="layui-input" value="{{$user->phone}}">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>不能为空
                </div>
            </div>

            <div class="layui-form-item">
                <label for="L_pass" class="layui-form-label">
                    <span class="x-red">*</span>邮箱
                </label>
                <div class="layui-input-inline">
                    <input type="email" id="" name="email" required="" lay-verify="email"
                           autocomplete="off" class="layui-input" value="{{$user->email}}">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>不能为空
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_pass" class="layui-form-label">
                    <span class="x-red">*</span>地址
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="" name="address" required="" lay-verify="address"
                           autocomplete="off" class="layui-input" value="{{$user->address}}">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>不能为空
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">性别</label>
                <div class="layui-input-block">
                    <input type="radio" name="sex" value="男" title="男" @if($user->sex=='男') checked @endif>
                    <input type="radio" name="sex" value="女" title="女" @if($user->sex=='女') checked @endif>
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                </label>
                <button  class="layui-btn" lay-filter="add" lay-submit="">
                    修改用户
                </button>
            </div>
        </form>
    </div>

    <script>
        layui.use(['form','layer'], function(){
            $ = layui.jquery;
            var form = layui.form
                ,layer = layui.layer;

            //自定义验证规则
            form.verify({
                username: [/^[\S]{4,16}$/,'用户名必须4到16位，且不能出现空格'],
            });
            //监听提交
            form.on('submit(add)', function(data){
                var id= $('input[type=hidden]').val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:'/admin/users/manger/'+id,
                    //layui表单提交
                    data:data.field,
                    dataType:'json',
                    type:'PUT',
                    success:function(data){
                        // console.log(data);
                        if(data.status==1){
                            layer.alert(data.msg,{icon:5,time:2000},function(){
                                //关闭弹层，刷新父页面
                                parent.location.reload();

                            })
                        }else {
                            layer.alert(data.msg,{icon:6,time:2000},function(){
                                //关闭弹层，刷新父页面

                                parent.location.reload();

                            })
                        }
                    }

                });
                return false;
            });
        });
    </script>


@endsection



