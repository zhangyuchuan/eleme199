<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title>欢迎页面-X-admin2.0</title>
    <meta name="renderer" content="webkit">
      <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
      @include('admin.public.styles')
      @include('admin.public.script')
  </head>
  
  <body>
    <div class="x-body">
        <form class="layui-form">
          {{--<div class="layui-form-item">--}}
              {{--<label for="L_email" class="layui-form-label">--}}
                  {{--<span class="x-red">*</span>用户名--}}
              {{--</label>--}}
              {{--<div class="layui-input-inline">--}}
                  {{--<input type="text" id="L_email" name="email" required="" lay-verify=""--}}
                  {{--autocomplete="off" class="layui-input">--}}
              {{--</div>--}}
              {{--<div class="layui-form-mid layui-word-aux">--}}
                  {{--<span class="x-red">*</span>将会成为您唯一的登入名--}}
              {{--</div>--}}
          {{--</div>--}}
          <div class="layui-form-item">
{{--              {{ csrf_field() }}--}}

              <input type="hidden" name="_method" value="PUT">
              <label for="L_username" class="layui-form-label">
                  <span class="x-red">*</span>用户名
              </label>
              <div class="layui-input-inline">
                  <input type="text" value="{{ $user->user_name }}" id="L_username" name="username" required="" lay-verify=""
                  autocomplete="off" class="layui-input">
              </div>
              <input type="hidden" name="userid" value="{{ $user->user_id }}">
          </div>

          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
              <button  class="layui-btn" lay-filter="edit" lay-submit="">
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
        
          //自定义验证规则
          form.verify({
            // nikename: function(value){
            //   if(value.length < 5){
            //     return '昵称至少得5个字符啊';
            //   }
            // }
            // ,pass: [/(.+){6,12}$/, '密码必须6到12位']
            // ,repass: function(value){
            //     if($('#L_pass').val()!=$('#L_repass').val()){
            //         return '两次密码不一致';
            //     }
            // }
          });

          //监听提交
          form.on('submit(edit)', function(data){

              //获取当前要修改的用户的id
              var uid = $("input[type='hidden']").val();
              console.log(uid);
              $.ajax({
                  type: "PUT",
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  url: "/admin/config/"+uid,
                  data: data.field,
                  dataType: "json",
                  success: function(data){
                      // 如果添加成功
                        if(data.status == 0){
                            layer.alert(data.msg,{icon:6,time:2000},function(){
                                //关闭弹层，刷新父页面
                                parent.location.reload(true);
                            })
                        }else{
                            layer.alert(data.msg,{icon:6,time:2000},function(){
                                //关闭弹层，刷新父页面
                                parent.location.reload(true);
                            })
                        }
                  }
              });




            // console.log(data);
            //发异步，把数据提交给php
            // layer.alert("增加成功", {icon: 6},function () {
            //     // 获得frame索引
            //     var index = parent.layer.getFrameIndex(window.name);
            //     //关闭当前frame
            //     parent.layer.close(index);
            // });
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
  </body>

</html>