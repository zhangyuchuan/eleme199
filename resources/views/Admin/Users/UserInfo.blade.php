@extends('Admin.Common.Common')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')

    <div class="x-body">
        <div class="layui-row">
            <form class="layui-form layui-col-md12 x-so" action="/admin/users/users/info" method="get">
                <div class="layui-input-inline">
                    <select name="num">
                        <option value="3"
                                @if($request['num'] == 3)  selected  @endif
                        >3
                        </option>
                        <option value="10"
                                @if($request['num'] == 10)  selected  @endif
                        >10
                        </option>
                    </select>
                </div>
                <input type="text" name="uname" value="{{$request->uname}}" placeholder="请输入用户名" autocomplete="off" class="layui-input">


                <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
            </form>
        </div>
        <xblock>
            {{--<button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>--}}

            {{--<span class="x-right" style="line-height:40px">共有数据：{{count($userinfo)}} 条</span>--}}
        </xblock>
        <table class="layui-table">
            <thead>
            <tr>
                <th>
                    <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
                </th>
                <th>用户ID</th>
                <th>用户名</th>
                <th>手机</th>
                <th>地址</th>
                <th>操作</th></tr>
            </thead>
            <tbody>

            @foreach($userinfo as $v)
                <tr>
                    <td>
                        <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='2'><i class="layui-icon">&#xe605;</i></div>
                    </td>
                    <td>{{$v->id}}</td>
                    <td>{{$v->uname}}</td>

                    <td>{{$v->phone}}</td>
                    <td>{{$v->address}}</td>

                    <td class="td-userInfo">
                    <a title="删除" onclick="member_del(this,'{{ $v->id }}')" href="javascript:;" status="{{$v->status}}">
                        <i class="layui-icon">&#xe640;</i>
                    </a>
                    </td>
                </tr>
            @endforeach


            </tbody>
        </table>
        <div class="page">
            <div>
                {{--        {{ $users->appends(['username' => $username])->links() }}--}}
                {!! $userinfo->appends($request->all())->render() !!}
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


        /*用户-删除*/
        function member_del(obj,id){
            layer.confirm('确认要删除吗？',function(index){
                $.post("{{ url('admin/users/users/del') }}/"+id,{'_token':"{{csrf_token()}}"},function(data){
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