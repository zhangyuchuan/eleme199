@extends('Admin.Common.Common')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="x-body">
        <div class="layui-row">
            <form class="layui-form layui-col-md12 x-so" action="/admin/goods" method="get">
                <div class="layui-input-inline">
                    <select name="num">
                        <option value="5"
                                @if($request['num'] == 5)  selected  @endif
                        >5
                        </option>
                        <option value="10"
                                @if($request['num'] == 10)  selected  @endif
                        >10
                        </option>
                    </select>
                </div>
                <input type="text" name="sid" value="{{$request->sid}}" placeholder="请输入店铺编号" autocomplete="off" class="layui-input">
                <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
            </form>
        </div>
        <xblock>
            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
            <span class="x-right" style="line-height:40px">共有数据：{{ $count }} 条</span>
        </xblock>
        <table class="layui-table">
            <thead>
            <tr>
                <th>
                    <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
                </th>
                <th>ID</th>
                <th>商品栏位</th>
                <th>栏位描述</th>
                <th>商家</th>
                <th>状态</th>
                <th>操作</th></tr>
            </thead>
            <tbody>
            @foreach($goodscate as $v)
            <tr>
                <td>
                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='{{ $v->id }}'><i class="layui-icon">&#xe605;</i></div>
                </td>
                <td>{{ $v->id }}</td>
                <td>{{ $v->category }}</td>
                <td>{{ $v->gcontent }}</td>
                <td>{{ $shops[$v->sid] }}</td>
                <td class="td-status">
                    @if($v->status == 1)
                        <span class="layui-btn layui-btn-normal layui-btn-mini">已启用 </span>
                </td>
                <td class="td-manage">
                    <a onclick="member_stop(this,'{{ $v->id }}') " href="javascript:;"  title="停用">
                        <i class="layui-icon">&#xe62f;</i>
                    </a>
                    @else
                        <span class="layui-btn layui-btn-normal layui-btn-mini layui-btn-disabled">已停用 </span>
                </td>
                <td class="td-manage">
                    <a onclick="member_stop(this,'{{ $v->id }}') " href="javascript:;"  title="启用">
                        <i class="layui-icon">&#xe601;</i>
                    </a>
                    @endif
                    <a title="删除" onclick="member_del(this,'{{ $v->id }}')" href="javascript:;">
                        <i class="layui-icon">&#xe640;</i>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="page">
            {!! $goodscate->appends($request->all())->render() !!}
        </div>

    </div>
    <script>
        layui.use('laydate', function(){
            var laydate = layui.laydate;

            //执行一个laydate实例
            laydate.render({
                elem: '#start' //指定元素
            });

            //执行一个laydate实例
            laydate.render({
                elem: '#end' //指定元素
            });
        });

        /*用户-停用*/
        function member_stop(obj,id){
            if($(obj).attr('title')=='启用'){
                layer.confirm('确认要启用吗？',function(){

                    $.ajax({
                        type:'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url:'/admin/goodscate/statusup',
                        data:{'id':id,},
                        success:function(data){
                            // console.log(data);
                            //发异步把用户状态进行更改
                            if (data == 1){
                                $(obj).attr('title','停用')
                                $(obj).find('i').html('&#xe62f;');
                                $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
                                layer.msg('已启用!',{icon: 1,time:1000});
                            }

                        }
                    })
                });
            }else{
                layer.confirm('确认要停用吗？',function(){
                    $.ajax({
                        type:'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url:'/admin/goodscate/statusdown',
                        data:{'id':id,},
                        success:function(data){
                            // console.log(data);
                            if (data == 1){
                                $(obj).attr('title','启用')
                                $(obj).find('i').html('&#xe601;');
                                $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
                                layer.msg('已停用!',{icon: 5,time:1000});
                            }

                        }
                    })

                });
            }
        }

        /*栏位-删除*/
        function member_del(obj,id){

            layer.confirm('确认要删除吗？', function (index) {
                $.ajax({
                    url: '/admin/goodscate/' + id,
                    data: '_token={{csrf_token()}}&_method=delete',
                    type: 'post',
                    dataType: 'json',
                    success: function (data) {
                        if (data.status == '0') {
                            $(obj).parents("tr").remove();
                            layer.msg('已删除!', {icon: 1, time: 1000});
                        } else {
                            layer.msg(data.msg, {icon: 2, time: 1000});
                        }
                    }
                })

            });

        }



        function delAll (argument) {
            var data = tableCheck.getData();

            layer.confirm('确认要删除吗？'+data,function(index){
                // layer.confirm('确认要删除吗？',function(index){
                $.post('/admin/goodscate/delall',{'_token':"{{csrf_token()}}",'ids':data},function(data){
                    // console.log(data);

                    if (data.status == '0') {

                        layer.msg('删除成功', {icon: 1});
                        $(".layui-form-checked").not('.header').parents('tr').remove();
                        location.reload(true);
                    }else{
                        layer.msg(data.msg, {icon: 1, time: 1000});
                    }
                })
                //捉到所有被选中的，发异步进行删除
            });
        }
    </script>
    <script>var _hmt = _hmt || []; (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();</script>

@endsection