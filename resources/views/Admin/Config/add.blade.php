@extends('Admin.Common.Common')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="x-body">

        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
            <legend>
                @if(session('error'))
                    session('error')
                    @else
                    请添加网站配置信息
                @endif
            </legend>
        </fieldset>
        <form enctype="multipart/form-data" id="art_form" class="layui-form" action="{{ url('admin/config') }}" method="post">
          {{ csrf_field() }}

            <div class="layui-form-item">

                <label for="L_username" class="layui-form-label">
                    <span class="x-red">*</span>配置项标题
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="L_username" name="conf_title" required="" lay-verify=""
                           autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                {{ csrf_field() }}
                <label for="L_username" class="layui-form-label">
                    <span class="x-red">*</span>配置项名称
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="L_username" name="conf_name" required="" lay-verify=""
                           autocomplete="off" class="layui-input">
                </div>
            </div>


            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">配置项内容</label>
                <div class="layui-input-block">
                    <textarea name="conf_content" placeholder="请输入内容" class="layui-textarea"></textarea>
                </div>
            </div>

            <div class="layui-form-item" >
                              {{ csrf_field() }}
                <label for="L_username" class="layui-form-label">
                    <span class="x-red">*</span>配置项类型
                </label>
                <div class="layui-input-block">
                    <input type="radio" name="field_type" value="input" title="文本框" >
                    <input type="radio" name="field_type" value="radio" title="单选框">
                    <input type="radio" name="field_type" value="textarea" title="文本域" >
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
                    <input type="hidden" name="cpic" value="">
                    <img id="cpic" src="" style="width:60px;">
                </div>
            </div>

            <div class="layui-form-item" >
                {{--              {{ csrf_field() }}--}}
                <label for="L_username" class="layui-form-label">
                    <span class="x-red">*</span>配置项排序
                </label>
                <div class="layui-input-inline" style="width:100px;">
                    <input type="text" id="L_username" name="conf_order" required="" lay-verify=""
                           autocomplete="off" class="layui-input">
                </div>
            </div>

          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
              <button  class="layui-btn" lay-filter="add" lay-submit="">
                  增加
              </button>
          </div>
      </form>
    </div>
    <script>

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
                url: "/admin/config/upload",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    $('#cpic').attr('src','/uploads/'+data);
                    $("input[name='cpic']").val(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("上传失败，请检查网络后重试");
                }
            });
        }

        layui.use(['form','layer'], function(){
            $ = layui.jquery;
          var form = layui.form,layer = layui.layer;

          //监听提交
          form.on('submit(add)', function(data){
            // return false;
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