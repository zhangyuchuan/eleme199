@extends('Admin.Common.Common')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
    <body>
    <div class="x-body">

        <table class="layui-table">
            <thead>
            <tr>
                <th>订单ID</th>
                <th>商品ID</th>
                <td>订单号</td>
                <th>商品图片</th>
                <th>商品单价</th>
                <th>商品数量</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ordersinfo as $v)
                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->gid}}</td>
                    <td>{{$v->oid}}</td>
                    <td><img src="/uploads/6.jpg" alt="" style="width:80px"></td>
                    <td>{{$v->bprice}}</td>
                    <td>{{$v->bcnt}}</td>




                </tr>
            </tbody>
            @endforeach
        </table>
        <div class="page">
            <div>
                {{$ordersinfo->links()}}
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


    </script>
    </body>
@endsection