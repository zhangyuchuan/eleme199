@extends('Admin.Common.Common')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')

    <div class="x-body">
        <div class="layui-row">
            <form class="layui-form layui-col-md12 x-so" action="/admin/users/users" method="get">
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
                <input type="text" name="username" value="{{$request->username}}" placeholder="请输入用户名" autocomplete="off" class="layui-input">
                <div class="layui-input-block" style="display:inline">
                    <input type="radio" name="sex"  title="男" value ="男" @if($request->sex=="男") checked @endif>
                    <input type="radio" name="sex"  title="女" value ="女" @if($request->sex=="女") checked @endif>
                </div>

                <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
            </form>
        </div>
        <xblock>
            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>

            <span class="x-right" style="line-height:40px">共有数据：{{count($users)}} 条</span>
        </xblock>
        <table class="layui-table">
            <thead>
            <tr>
                <th>
                    <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
                </th>
                <th>ID</th>
                <th>用户名</th>
                <th>性别</th>
                <th>手机</th>
                <th>状态</th>
                <th>操作</th></tr>
            </thead>
            <tbody>

            @foreach($users as $v)
            <tr>
                <td>
                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='2'><i class="layui-icon">&#xe605;</i></div>
                </td>
                <td>{{$v->id}}</td>
                <td>{{$v->username}}</td>
                <td>{{$v->sex}}</td>
                <td>{{$v->phone}}</td>

                @if($v->status==0)
                <td class="td-status">
                    <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                @else
                    <td class="td-status">
                        <span class="layui-btn layui-btn-normal layui-btn-mini layui-btn-disabled">已停用</span></td>
                @endif
                <td class="td-manage">
                    <a onclick="member_stop(this,'{{ $v->id }}')" href="javascript:;" status="{{ $v->status }}" title="启用">
                        <i class="layui-icon">&#xe601;</i>
                    </a>
                    <a title="编辑"  onclick="x_admin_show('编辑','/admin/users/users/grade',600,400)" href="javascript:;">
                        <i class="layui-icon">&#xe642;</i>
                    </a>
                    <a onclick="x_admin_show('修改密码','/admin/users/users/audit',600,400)" title="修改密码" href="javascript:;">
                        <i class="layui-icon">&#xe631;</i>
                    </a>
                    <a title="删除" onclick="member_del(this,'{{ $v->id }}')" href="javascript:;">
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
                {!! $users->appends($request->all())->render() !!}
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

        /*用户-停用*/

        function member_stop(obj,id){
            var status = $(obj).attr('status');


                if ($(obj).attr('title') == '启用') {
                    layer.confirm('确认要停用吗？',function(index) {
                    $.ajax({
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "/admin/users/users/changestatus",
                        data: {'id': id, 'status': status},
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            //发异步把用户状态进行更改
                            $(obj).attr('title', '停用')
                            $(obj).find('i').html('&#xe62f;');

                            $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
                            layer.msg('已停用!', {icon: 5, time: 1000});
                        }
                    });
                });

                } else {

                    layer.confirm('确认要启用吗？', function (index) {

                            $.ajax({
                                type: "POST",
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url: "/admin/users/users/changestatus",
                                data: {'id': id, 'status': status},
                                dataType: "json",
                                success: function (data) {
                                    console.log(data);
                                    $(obj).attr('title', '启用')
                                    $(obj).find('i').html('&#xe601;');

                                    $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
                                    layer.msg('已启用!', {icon: 5, time: 1000});
                                }
                            });

                        });

                    }

            }

        /*用户-删除*/
        function member_del(obj,id){
            layer.confirm('确认要删除吗？',function(index){
                $.post("{{ url('admin/users/users') }}/"+id,{'_token':"{{csrf_token()}}",'_method':'delete'},function(data){
                    //如果删除成功
                    if(data.status == 0) {
                        //发异步删除数据
                        $(obj).parents("tr").remove();
                        layer.msg('已删除!', {icon: 1, time: 1000});
                    }
                 });
            });
        }



        function delAll (argument) {

            layer.confirm('确认要删除吗？',function(index){
                var ids = [];
                $('.layui-form-checked').not('.header').each(function(i,v){
                    ids.push($(v).attr('data-id'))
                })
                $.get('/admin/users/users/delall',{'ids':ids},function(data){
                    if(data.status=='0'){
                        layer.msg('删除成功', {icon: 1});
                        $(".layui-form-checked").not('.header').parents('tr').remove();
                        location.reload(true);
                    }else{
                        layer.msg('删除失败', {icon: 2});
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