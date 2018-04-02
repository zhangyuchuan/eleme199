@extends('Admin.Common.Common')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
    <div class="x-body">
        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
            <legend>
                @if(session('error'))
                    session('error')
                @else
                    分类信息修改
                @endif
            </legend>
        </fieldset>
        <form class="layui-form" >
            <input type="hidden" name="id" value="{{$cateone->id}}">
            <div class="layui-form-item">
                <label for="username" class="layui-form-label">
                    <span class="x-red">*</span>排序
                </label>
                <div class="layui-input-inline">
                <input type="text" id="order" value="{{$cateone->order}}" name="order" required="" lay-verify="required"
                       autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="username" class="layui-form-label">
                    <span class="x-red">*</span>分类名称
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="catename" name="catename"  value="{{$cateone->catename}}" required="" lay-verify="required"
                           autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">分类描述</label>
                    <div class="layui-input-block">
                        <textarea name="description" placeholder="请输入内容" class="layui-textarea">{{$cateone->description}}</textarea>
                    </div>
                </div>
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


            //监听提交
            form.on('submit(edit)', function(data){
                var id = $("input[type='hidden']").val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:'/admin/shops/'+id,
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
                        }else{
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