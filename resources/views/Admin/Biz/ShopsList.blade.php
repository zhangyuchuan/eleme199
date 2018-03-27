@extends('Admin.Common.Common')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="x-body">
        <div class="layui-row">
            <form class="layui-form layui-col-md12 x-so">
                <input type="text" name="keywords1" value="{{$request->keywords1}}" placeholder="请输入用户名" autocomplete="off" class="layui-input">
                <input type="text" name="keywords2" value="{{$request->keywords2}}" placeholder="请输入邮箱" autocomplete="off" class="layui-input">
                <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
            </form>
        </div>
        <xblock>
            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
            <span class="x-right" style="line-height:40px">此页共有数据：{{count($users)}} 条</span>

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
                <th>邮箱</th>
                <th>地址</th>
                <th>状态</th>
                <th>操作</th></tr>
            </thead>
            <tbody>
            @foreach($users as $v)
            <tr>
                <td>
                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='{{$v->id}}'><i class="layui-icon">&#xe605;</i></div>
                </td>
                <td>{{$v->id}}</td>
                <td>{{$v->username}}</td>
                <td>{{$v->sex}}</td>
                <td>{{$v->phone}}</td>
                <td>{{$v->email}}</td>
                <td>{{$v->address}}</td>
                <td class="td-status">
                    <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                <td class="td-manage">
                    <a onclick="member_stop(this,{{ $v->id }})" href="javascript:;" status="{{ $v->status }}"  title="启用">
                        <i class="layui-icon">&#xe601;</i>
                    </a>
                    <a title="删除" onclick="member_del(this,'{{$v->id}}')" href="javascript:;">
                        <i class="layui-icon">&#xe640;</i>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="page">
            {{--        {{ $users->appends(['username' => $username])->links() }}--}}
            {!! $users->appends($request->all())->render() !!}
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
            //获取要改变状态的用户的id

            //获取当前改变用户的状态
            var status = $(obj).attr('status');


            layer.confirm('确认要停用吗？',function(list){

                if($(obj).attr('title')=='启用'){


                    $.ajax({
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "/admin/biz/biz/changestatus",
                        data: {'id':id,'status':status},
                        dataType: "json",
                        success: function(data){
                            //发异步把用户状态进行更改
                            $(obj).attr('title','停用')
                            $(obj).find('i').html('&#xe62f;');

                            $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
                            layer.msg('已停用!',{icon: 5,time:1000});
                        }
                    });



                }else{
                    $(obj).attr('title','启用')
                    $(obj).find('i').html('&#xe601;');

                    $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
                    layer.msg('已启用!',{icon: 5,time:1000});
                }

            });
        }

        /*用户-删除*/
        function member_del(obj,id){
            //获取用户ID



            layer.confirm('确认要删除吗？',function(list){

                // $.post('请求的路径','携带的参数'，执行成功后的返回结果)
                $.post("{{ url('/admin/biz/biz/destroy') }}/"+id,{'_token':"{{csrf_token()}}"},function(data){
                    //如果删除成功
                    if(data.status == 0){
                        //发异步删除数据
                        $(obj).parents("tr").remove();
                        layer.msg('已删除!',{icon:1,time:1000});
                    }else{
                        layer.msg('删除失败!',{icon:1,time:1000});
                    }
                });

            });
        }


        function delAll () {

            var data = tableCheck.getData();



            layer.confirm('确认要删除吗？'+data,function(index){
                //声明一个空数组，存放所有被选中的复选框的data-id属性值
                var ids = [];
                //获取所有的被选中的复选框
                $('.layui-form-checked').not('.header').each(function(i,v){
                    ids.push($(v).attr('data-id'));
                });
                // console.log(ids);
                $.get('/admin/biz/biz/delall',{ids:ids},function(data){
                    //后台如果删除成功，在前台上也把相关记录删除掉
                    // console.log(data);
                    if(data.status == 0){
                        layer.msg('删除成功', {icon: 1});
                        $(".layui-form-checked").not('.header').parents('tr').remove();
                    }else{
                        layer.msg('删除失败', {icon: 2});
                    }
                })

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