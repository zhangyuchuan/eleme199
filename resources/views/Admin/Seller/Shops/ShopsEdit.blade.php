@extends('Admin.Common.Common')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
    <div class="x-body">
        <form class="layui-form" method="post" enctype="multipart/form-data" >
            {{csrf_field()}}
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
                    <span class="x-red">*</span>店铺地址
                </label>
                <div class="layui-input-inline">
                    <textarea name="address" id="" cols="30" rows="10">{{$shop->address}}</textarea>
                </div>
            </div>
            <div class="layui-form-item">
                <label for="phone" class="layui-form-label">
                    <span class="x-red">*</span>店铺logo
                </label>
                <div class="layui-input-inline" style="position:relative;height:120px">
                    <input type="file" id="file_upload" name="logo" required="" value="{{$shop->logo}}" style="opacity:0;position:absolute;top:10px;z-index:111111;">
                    <img src="/uploads/timg.jpg" alt="" class="layui-upload-img" id="demo1" style="width:50px;height:40px;position:absolute;top:0px;z-index:0">
                    <img src="{{$shop->logo}}" alt=""  id="img2" style="width:80px;height:60px;position:absolute;top:50px;left:0px">
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

    <script>
        layui.use(['form','layer'], function(){
            $ = layui.jquery;
            var form = layui.form
                ,layer = layui.layer;
            //监听提交
            form.on('submit(add)', function(data){
                var id= $('input[name=id]').val();
                var src = $('#img2').attr('src');
                data.field.logo=src;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:'/admin/seller/shops/'+id,
                    //layui表单提交
                    data:data.field,
                    dataType:'json',
                    type:'PUT',
                    success:function(data){
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
        $(function () {
            $("#file_upload").change(function () {
                uploadImage();
            })
        })
        function uploadImage() {
            //  判断是否有选择上传文件
            var imgPath = $("#file_upload").val();
            if (imgPath == "") {
                alert("请选择上传图片！");
                return;
            }
            //判断上传文件的后缀名
            var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
            if (strExtension != 'jpg' && strExtension != 'gif'
                && strExtension != 'png' && strExtension != 'bmp') {
                alert("请选择图片文件");
                return;
            }
            // var formData = new FormData($('#art_form')[0]);
            var formData = new FormData();
            formData.append('logo',$('#file_upload')[0].files[0]);
            $.ajax({
                type: "POST",
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/admin/seller/shops/uploadfile",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    $('#img2').attr('src','/uploads/'+data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("上传失败，请检查网络后重试");
                }
            });
        }
    </script>

@endsection