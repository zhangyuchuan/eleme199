@extends('Admin.Common.Common')

@section('content')
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
                {{--              {{ csrf_field() }}--}}
                <label for="L_username" class="layui-form-label">
                    <span class="x-red">*</span>配置项类型
                </label>
                <div class="layui-input-block">
                    <input type="radio" name="field_type" value="input" title="文本框" >
                    <input type="radio" name="field_type" value="radio" title="单选框">
                    <input type="radio" name="field_type" value="textarea" title="文本域" >
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