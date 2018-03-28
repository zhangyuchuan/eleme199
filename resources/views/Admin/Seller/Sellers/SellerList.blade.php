@extends('Admin.Common.Common')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="x-body">
        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 18px;">
            <legend style="margin:0px auto;color:red">
                @if(session('error'))
                    session('error')
                @else
                    个人详情信息
                @endif
            </legend>
        </fieldset>

        <table class="layui-table" style="width:400px;margin:50px auto; ">
            {{--<thead>--}}
            <tr style="width:40px">
                <th style="font-size:18px">ID</th>
                <td>{{$user->id}}</td>
            </tr>
            <tr>
                <th style="font-size:18px">用户名</th>
                <td>{{$user->username}}</td>
            </tr>
            <tr>
                <th style="font-size:18px">性别</th>
                <td>{{$user->sex}}</td>
            </tr>
            <tr>
                <th style="font-size:18px">手机</th>
                <td>{{$user->phone}}</td>
            </tr>
            <tr>
                <th style="font-size:18px">地址</th>
                <td>{{$user->address}}</td>
            </tr>
            <tr>
                <th style="font-size:18px">邮箱</th>
                <td>{{$user->email}}</td>
            </tr>
            <tr>
                <th style="font-size:18px">操作</th>
                <td class="td-status">
                    <a title="编辑"  onclick="x_admin_show('编辑','/admin/seller/sellers/{{$user->id}}/edit',600,400)" href="javascript:;">
                        <i class="layui-icon">&#xe642;</i>
                    </a>
                    &nbsp;&nbsp;
                    <a onclick="x_admin_show('修改密码','/admin/seller/sellers/repass/{{$user->id}}',600,400)" title="修改密码" href="javascript:;">
                        <i class="layui-icon">&#xe631;</i>
                    </a>
                    &nbsp;&nbsp;
                    <a title="注销" onclick="member_del(this,'{{$user->id}}')" href="javascript:;"  status="{{$user->status}}">
                        <i class="layui-icon">&#xe600;</i>
                    </a>
                </td>
            </tr>
        </table>
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

        /*用户-注销*/
        function member_del(obj,id){

                layer.confirm('确认要注销吗？', function (index) {
                    $.ajax({
                        url: '/admin/seller/sellers/' + id,
                        data: '_token={{csrf_token()}}&_method=delete',
                        type: 'post',
                        dataType: 'json',
                        success: function (data) {
                            if (data.status == '0') {
                                $(obj).parents("tr").remove();
                                layer.msg('已注销!', {icon: 1, time: 1000});
                            } else {
                                layer.msg('注销失败!', {icon: 2, time: 1000});
                            }
                        }
                    })

                });
        }

    </script>

@endsection