@extends('Admin.Common.Common')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="x-body">
        <div class="layui-row">
            <form class="layui-form layui-col-md12 x-so" action="/admin/users/manger" method="get">
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
            <button class="layui-btn" onclick="x_admin_show('添加用户','{{ url('/admin/users/manger/create')}}',600,500)"><i class="layui-icon"></i>添加</button>
            <span class="x-right" style="line-height:40px">共有数据：{{count($user)}} 条</span>
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
            @foreach($manger as $v)
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
                    @if($v->status=='0')
                    <span class="layui-btn layui-btn-normal layui-btn-mini" id="spans"> 已启用 </span>
                </td>
                <td class="td-manage">
                    <a  id='as' onclick="member_stop(this,'{{$v->id}}')" href="javascript:;"  title="停用 "
                       status="{{$v->status}}">
                        <i class="layui-icon" id="is"> &#xe601;</i>
                    </a>
                    @elseif($v->status=='1')
                        <span class="layui-btn layui-btn-normal layui-btn-mini layui-btn-disabled "> 已停用 </span>
                </td>
                <td class="td-manage">
                    <a id='as' onclick="member_stop(this,'{{$v->id}}')" href="javascript:;"  title="启用 "
                       status="{{$v->status}}">
                        <i class="layui-icon">&#xe62f; </i>
                    </a>
                    @endif
                    <a title="编辑"  onclick="x_admin_show('编辑','/admin/users/manger/{{$v->id}}/edit',600,400)" href="javascript:;">
                        <i class="layui-icon">&#xe642;</i>
                    </a>
                    <a onclick="x_admin_show('修改密码','/admin/users/manger/repass/{{$v->id}}',600,400)" title="修改密码" href="javascript:;">
                        <i class="layui-icon">&#xe631;</i>
                    </a>
                    <a title="删除" onclick="member_del(this,'{{$v->id}}')" href="javascript:;"  status="{{$v->status}}">
                        <i class="layui-icon">&#xe640;</i>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="page">
            <div>
                {!! $manger->appends($request->all())->render() !!}
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
            var str = '';
            if(status=='0'){
                str = '确认要停用吗?';
            }else{
                str = '确认要启用吗?';
            }
            layer.confirm(str,function(index){
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url:'/admin/users/manger/status',
                            data:{'id':id,'status':status},
                            dataType:'json',
                            type:'POST',
                            success:function(data){
                                if(data=='0'){
                                    $(obj).attr('status','0');
                                    $(obj).find('i').html('&#xe601;');
                                    $(obj).attr('title','停用');
                                    $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
                                    layer.msg('已启用!',{icon: 6,time:1000});
                                }else if(data=='1'){
                                    $(obj).attr('status','1');
                                    $(obj).find('i').html('&#xe62f;');
                                     $(obj).attr('title','启用');
                                     $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
                                    layer.msg('已停用!',{icon: 6,time:1000});
                                }else{
                                    layui.alert('修改失败');
                                }

                            },
                            timeout:3000,
                            async:true
                        })
            });
        }

        /*用户-删除*/
        function member_del(obj,id){

                layer.confirm('确认要删除吗？', function (index) {
                    $.ajax({
                        url: '/admin/users/manger/' + id,
                        data: '_token={{csrf_token()}}&_method=delete',
                        type: 'post',
                        dataType: 'json',
                        success: function (data) {
                            if (data.status == '0') {
                                $(obj).parents("tr").remove();
                                layer.msg('已删除!', {icon: 1, time: 1000});
                            } else {
                                layer.msg('删除失败!', {icon: 2, time: 1000});
                            }
                        }
                    })

                });

        }


        //全部删除
        function delAll (argument) {

            layer.confirm('确认要删除吗？',function(index){
                var ids = [];
                $('.layui-form-checked').not('.header').each(function(i,v){
                    ids.push($(v).attr('data-id'))
                })
                $.get('/admin/users/manger/delall',{'ids':ids},function(data){
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

@endsection