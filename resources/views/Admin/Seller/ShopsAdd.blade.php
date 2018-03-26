@extends('Admin.Common.Common')
@section('content')
    <div class="x-body">
        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
            <legend>
                @if(session('error'))
                    session('error')
                @else
                    请添加分类信息
                @endif
            </legend>
        </fieldset>
        <form class="layui-form" action="{{url('admin/shops')}}" method="post">
            {{csrf_field()}}
            <div class="layui-form-item">
                <label for="username" class="layui-form-label">
                    <span class="x-red">*</span>一级分类
                </label>
                <div class="layui-input-block" style="width:200px">
                    <select name="pid" lay-filter="">
                        <option value=""></option>
                        @foreach($cateone as $v)
                            <option value="{{ $v->id }}">{{ $v->catename }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label for="username" class="layui-form-label">
                    <span class="x-red">*</span>分类名称
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="catename" name="catename" required="" lay-verify="required"
                           autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">分类描述</label>
                    <div class="layui-input-block">
                        <textarea name="description" placeholder="请输入内容" class="layui-textarea"></textarea>
                    </div>
                </div>
            </div>
            <div class="layui-form-item">
                <label for="order" class="layui-form-label">
                    <span class="x-red">*</span>分类排序
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="order" name="order" required="" lay-verify="order"
                           autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                </label>
                <button  class="layui-btn" lay-filter="add" lay-submit="">
                  添加分类
                </button>
            </div>
        </form>
    </div>


@endsection