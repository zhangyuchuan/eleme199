@extends('Admin.Common.Common')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <form enctype="multipart/form-data" class="layui-form" action="" method="post">
        {{csrf_field()}}
        <div class="layui-form-item">
            <label class="layui-form-label">商品名称</label>
            <div class="layui-input-inline">
                <input type="text" name="gname" required  lay-verify="required" value="{{ $goods ->gname }}" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">商家编号</label>
            <div class="layui-input-inline ">
                <input type="text" name="sid" required lay-verify="required" value="{{ $goods ->sid }}" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-input-inline ">
                <input type="text" name="" id="sname" placeholder="商家" disabled autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux"> </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">商品栏位</label>
            <div class="layui-input-inline">
                <select name="gcid" lay-verify="required">
                    <option value=""></option>
                    @foreach($goodscate as $v)
                    <option value="{{ $v['id'] }}">{{ $v['category'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">价格</label>
            <div class="layui-input-inline">
                <input type="text" name="price" required  lay-verify="required"value="{{ $goods ->price }}" autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-upload">
            <label class="layui-form-label">缩略图上传</label>

            <div class="layui-upload-list" style="position: relative;">
                <input id="file_upload" type="file" name="fileupload" value="" style="opacity:0.0;position: relative;z-index:99999999"   >
                <img style="with:60px;height:30px;position: absolute;left:120px;top:0px;z-index:1;" class="layui-upload-img" id="demo1" src="/admin/images/shangchuan.jpg">
                <p id="demoText"></p>


            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label"></label>
            <div class="layui-input-block">
                <input type="hidden" name="gpic" value="">
                <img id="gpic" src="{{ '/uploads/'.$goods->gpic }}" style="width:60px;">
            </div>
        </div>

        <script type="text/javascript">
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
                formData.append('fileupload',$('#file_upload')[0].files[0]);

                $.ajax({
                    type: "POST",
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/admin/goods/upload",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data);
                         $('#gpic').attr('src','/uploads/'+data);
                         $("input[name='gpic']").val(data);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert("上传失败，请检查网络后重试");
                    }
                });
            }
        </script>
        <div class="layui-form-item">
            <label class="layui-form-label">状态</label>
            <div class="layui-input-block">
                <input type="radio" name="status" value="1" title="新品" {{ ($goods->status==1)?'checked': '' }}>
                <input type="radio" name="status" value="2" title="上架" {{ ($goods->status==2)?'checked': '' }}>
                <input type="radio" name="status" value="4" title="活动" {{ ($goods->status==3)?'checked': '' }}>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">商品描述</label>
            <div class="layui-input-inline">
                <textarea name="gdesc"  class="layui-textarea" style="resize: none;width: 400px;">{{ $goods->gdesc }}</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo">添加</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>

    <script>
        //Demo
        layui.use('form', function(){
            var form = layui.form;

            //监听提交
            form.on('submit(formDemo)', function(data){
                // console.log(data);
                $.ajax({
                    type: "PUT",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/admin/goods/"+{{ $id }},
                    data: data.field,
                    dataType: "json",
                    success: function(data){
                        console.log(data);
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