@extends('Admin.Common.Common')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="x-body">
        <div class="layui-row">
            <form class="layui-form layui-col-md12 x-so" action="/admin/order/order/list" method="get">

                <input type="text" name="username" value="{{$request->sid}}" placeholder="请输入店铺名" autocomplete="off" class="layui-input">


                <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
            </form>
        </div>
        <xblock>
            {{--<button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>--}}

            <span class="x-right" style="line-height:40px">共有数据：{{count($orders)}}  条</span>
        </xblock>
        <table class="layui-table">
            <thead>

            <tr>

                <th>订单ID</th>
                <th>用户注册ID</th>
                <th>数量</th>
                <th>店铺ID</th>
                <th>买家留言</th>
                <th>订单时间</th>
                <th>总价</th>
                <th>地址ID</th>
                <th>状态</th>
                <th>操作</th>

            </thead>
            <tbody>
            @foreach($order as $v)
            <tr>

                <td>{{$v->oid}}</td>
                <td>{{$v->uid}}</td>
                <th>{{$v->ocnt}}</th>
                <td>{{$v->sid}}</td>
                <td>{{$v->umag}}</td>
                <td>{{$v->ordertime}}</td>
                <td>{{$v->totalprice}}</td>
                <td>{{$v->addrid}}</td>

                @if($v->status==0)
                    <td class="td-status">
                        <span class="layui-btn layui-btn-normal layui-btn-mini">已下单</span></td>
                @else
                    <td class="td-status">
                        <span class="layui-btn layui-btn-normal layui-btn-mini layui-btn-disabled">未下单</span></td>
                @endif

                <td class="td-manage">
                    <a onclick="member_stop(this,'{{ $v->oid }}')" href="javascript:;" status="{{ $v->status }}" title="订单设置">
                        <i class="layui-icon">&#xe601;</i>
                    </a>
                    <a title="订单详情" class=" layui-btn layui-btn-normal layui-btn-mini" onclick="x_admin_show('订单详情','/admin/order/order/info',600,400)" title="订单详情" href="javascript:;">
                        订单详情
                    </a>
                    <a title="删除" onclick="member_del(this,'{{ $v->oid }}')" href="javascript:;">
                        <i class="layui-icon">&#xe640;</i>
                    </a>
                </td>

            </tr>

            @endforeach

            </tbody>
        </table>
        <div class="page">
            <div>
                {!! $order->appends($request->all())->render() !!}
            </div>
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

        /*用户-下单*/

        function member_stop(obj,oid){
            var status = $(obj).attr('status');


            if ($(obj).attr('title') == '取消') {
                layer.confirm('确认要取消订单吗？',function(index) {
                    $.ajax({
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "/admin/order/order/changestatus",
                        data: {'oid': oid, 'status': status},
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            //发异步把用户状态进行更改
                            $(obj).attr('title', '取消订单')
                            $(obj).find('i').html('&#xe62f;');

                            $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已取消');
                            layer.msg('已取消!', {icon: 5, time: 1000});
                        }
                    });
                });

            } else {

                layer.confirm('确认要下单吗？', function (index) {

                    $.ajax({
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "/admin/order/order/changestatus",
                        data: {'oid': oid, 'status': status},
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            $(obj).attr('title', '下单')
                            $(obj).find('i').html('&#xe601;');

                            $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已下单');
                            layer.msg('已取消!', {icon: 5, time: 1000});
                        }
                    });

                });

            }

        }

        /*用户-删除*/
        function member_del(obj,id){
            layer.confirm('确认要删除吗？',function(index){
                $.post("{{ url('admin/order/order') }}/"+id,{'_token':"{{csrf_token()}}",'_method':'delete'},function(data){
                    //如果删除成功
                    if(data.status == 0) {
                        //发异步删除数据
                        $(obj).parents("tr").remove();
                        layer.msg('已删除!', {icon: 1, time: 1000});
                    }
                });
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