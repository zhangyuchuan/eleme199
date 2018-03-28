@extends('Admin.Common.Common')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="x-body">
        <form class="layui-form">


            <input type="hidden" name="sid" value="{{ $goodscate->sid }}" >
            <div class="layui-form-item">
                <label for="L_pass" class="layui-form-label">
                    <span class="x-red">*</span>新栏位名称
                </label>
                <div class="layui-input-inline">
                    <input type="text" name="category" required="" value="{{$goodscate->category}}" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    好名称吸引人
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">栏位描述</label>
                <div class="layui-input-inline">
                    <textarea name="gcontent" placeholder="请输入内容" class="layui-textarea" style="resize: none;width: 400px;">{{$goodscate->gcontent}}</textarea>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">状态</label>
                <div class="layui-input-block">
                    <input type="radio" name="status" value="1" title="启用" {{ ($goodscate->status==1)?'checked': '' }}>
                    <input type="radio" name="status" value="0" title="停用" {{ ($goodscate->status==0)?'checked': '' }}>
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                </label>
                <button  class="layui-btn" lay-filter="add" lay-submit="">
                    确认修改
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


            //监听提交
            form.on('submit(add)', function(data){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:'/admin/seller/goodscate/'+'{{ $goodscate->id }}',
                    //layui表单提交
                    data:data.field,
                    dataType:'json',
                    type:'put',
                    success:function(data){
                        // console.log(data);
                        if(data.status==0){
                            layer.alert(data.msg,{icon:6},function(){
                                //关闭弹层，刷新父页面
                                parent.location.reload();
                            })
                        }else{
                            layer.alert(data.msg,{icon:6,time:2000},function(){
                                //关闭弹层，刷新父页面
                                parent.location.reload();
                            })
                        }
                    }

                });
                // console.log(data);
                // //发异步，把数据提交给php
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

@endsection