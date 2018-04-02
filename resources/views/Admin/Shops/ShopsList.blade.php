@extends('Admin.Common.Common')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
    <body>

    <div class="x-body">

        {{--<xblock>--}}
            {{--<button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>--}}
            {{--<button class="layui-btn" onclick="x_admin_show('添加用户','{{url('admin/shops/create')}}',600,400)"><i class="layui-icon"></i>添加分类</button>--}}
            <span class="x-right" style="line-height:40px">共有分类：{{count($cates)}} 条</span>
        {{--</xblock>--}}
        <table class="layui-table">
            <thead>
            <tr>
                <th>排序</th>
                <th>ID</th>
                <th>分类名</th>
                <th>分类描述</th>
                <th>店铺列表</th>
                <th>操作</th></tr>
            </thead>
            <tbody>
            @foreach($cates as $k=>$v)
                <tr>
                <td>
                    <input style="width: 40px;" lay-verify="required|number" type="text" name="order" onchange="changeOrder(this,{{ $v->id }});" value="{{ $v->order }}"  autocomplete="off" class="layui-input">
                </td>
                <td>{{$v->id}}</td>
                <td>{{$v->catename}}</td>
                <td>{{$v->description}}</td>
                <td>
                    <a title="店铺列表" class=" layui-btn layui-btn-normal layui-btn-mini" onclick="x_admin_show('店铺列表','/admin/shops/{{$v->id}}',1250,550)" href="javascript:;">
                        店铺详情列表
                    </a>

                </td>
                <td class="td-manage">
                    <a title="编辑"  onclick="x_admin_show('编辑','/admin/shops/{{$v->id}}/edit',650,450)" href="javascript:;">
                        <i class="layui-icon">&#xe642;</i>
                    </a>
                    <a title="删除" onclick="member_del(this,'{{$v->id}}')" href="javascript:;">
                        <i class="layui-icon">&#xe640;</i>
                    </a>
                </td>
            </tr>
            </tbody>
            @endforeach
        </table>

        <div class="page">
            <div>
                {{--分页区域--}}
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


        //排序
        function changeOrder(obj,id)
        {
            //获取排序值
            var order = $(obj).val();
            //发送ajax
            $.post('/admin/shops/changeorder',{'order':order,'_token':'{{csrf_token()}}','id':id},function(data){
                // console.log(data);
                if(data.status=='0'){
                    layer.alert(data.msg,{icon:6,time:1000})
                    window.location.reload()
                }else{
                    layer.alert(data.msg,{icon:5,time:3000})
                    // window.location.reload()
                }
            })
        }
        /*用户-删除*/
        function member_del(obj,id){
            layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:'/admin/shops/'+id,
                data:id,
                dataType:'json',
                type:'DELETE',
                success:function(data){
                    // console.log(data);
                    if(data.status =='0'){
                        //发异步删除数据
                        $(obj).parents("tr").remove();
                        layer.msg('已删除!',{icon:1,time:1000});
                    }else{
                        layer.msg('该分类下不为空不能删除!',{icon:2,time:1000});
                    }
                },
                timeout:3000,
                async:true
            })
            });
        }


    </script>
    </body>

@endsection