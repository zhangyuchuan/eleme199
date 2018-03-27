@extends('Admin.Common.Common')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
    <div class="x-body">
        <form class="layui-form" >
            <input type="hidden" name="id" value="{{$shop->id}}">
            <div class="layui-form-item">
                <label for="username" class="layui-form-label">
                    <span class="x-red">*</span>店铺名称
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="username" name="name" required="" lay-verify="username"
                           autocomplete="off" class="layui-input" value="{{$shop->name}}">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>
                </div>
            </div>
            <div class="layui-form-item">
                <label for="phone" class="layui-form-label">
                    <span class="x-red">*</span>地址
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="phone" name="address" required="" lay-verify="phone"
                           autocomplete="off" class="layui-input" value="{{$shop->address}}">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="phone" class="layui-form-label">
                    <span class="x-red">*</span>营业时间
                </label>

                <div class="layui-input-inline">
                    <input type="text" id="phone" name="time" required="" lay-verify="phone"
                           autocomplete="off" class="layui-input" value="{{$shop->time}}">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="phone" class="layui-form-label">
                    <span class="x-red">*</span>店铺公告
                </label>
                <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
                <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
                <script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
                <div class="layui-input-inline">
                    <script  id="editor"  name="art_content"  type="text/plain"  style="width:620px;height:250px;">{{$shop->content}}</script>
                </div>
                <script type="text/javascript">var ue = UE.getEditor('editor');</script>
            </div>
            <div class="layui-form-item">
                <label for="phone" class="layui-form-label">
                    <span class="x-red">*</span>店铺logo
                </label>
                <div class="layui-input-inline" style="position:relative;height:120px">
                    <input type="file" id="phone" name="logo" required="" value="{{$shop->logo}}" style="opacity:0;position:absolute;top:10px;z-index:111111;">
                    <img src="/uploads/timg.jpg" alt="" style="width:50px;height:40px;position:absolute;top:0px;z-index:0">
                    <img src="/uploads/201803250257203124.jpg" alt="" style="width:80px;height:80px;position:absolute;top:50px;left:0px">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                </label>
                <button  class="layui-btn" lay-filter="add" lay-submit="">
                    修改信息
                </button>
            </div>
        </form>
    </div>

    {{--<script>--}}
        {{--layui.use(['form','layer'], function(){--}}
            {{--$ = layui.jquery;--}}
            {{--var form = layui.form--}}
                {{--,layer = layui.layer;--}}

            {{--//自定义验证规则--}}
            {{--form.verify({--}}
                {{--username: [/^[\S]{4,16}$/,'用户名必须4到16位，且不能出现空格'],--}}
            {{--});--}}
            {{--//监听提交--}}
            {{--form.on('submit(add)', function(data){--}}
                {{--var id= $('input[type=hidden]').val();--}}
                {{--$.ajax({--}}
                    {{--headers: {--}}
                        {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
                    {{--},--}}
                    {{--url:'/admin/users/manger/'+id,--}}
                    {{--//layui表单提交--}}
                    {{--data:data.field,--}}
                    {{--dataType:'json',--}}
                    {{--type:'PUT',--}}
                    {{--success:function(data){--}}

                        {{--if(data.status==1){--}}
                            {{--layer.alert(data.msg,{icon:5,time:2000},function(){--}}
                                {{--//关闭弹层，刷新父页面--}}
                                {{--parent.location.reload();--}}

                            {{--})--}}
                        {{--}else{--}}
                            {{--layer.alert(data.msg,{icon:6,time:2000},function(){--}}
                                {{--//关闭弹层，刷新父页面--}}

                                {{--parent.location.reload();--}}

                            {{--})--}}
                        {{--}--}}
                    {{--}--}}

                {{--});--}}
                {{--return false;--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}

@endsection