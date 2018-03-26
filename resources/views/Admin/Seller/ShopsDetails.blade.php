@extends('Admin.Common.Common')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
    <body>
    <div class="x-body">
        <span class="x-right" style="line-height:40px">共有店铺：{{$count}} 条</span>
        <table class="layui-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>店铺名</th>
                <th>店铺地址</th>
                <th>店铺logo</th>
                <th>店铺销量</th>
                <th>店铺积分</th>
                <th>店铺订单</th>
                <th>店铺状态</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($details as $k=>$v)
                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->name}}</td>
                    <td style="width:220px">{{$v->address}}</td>
                    <td><img src="/uploads/201803250257203124.jpg" alt="" style="width:80px"></td>
                    <td>{{$v->sailcount}}</td>
                    <td>{{$v->score}}</td>
                    <td>{{$v->order}}</td>
                    <td class="td-status">
                        @if($v->status=='0'||$v->status=='1')
                            <span class="layui-btn layui-btn-normal layui-btn-mini" id="spans"> 正常营业 </span>
                    </td>
                    <td class="td-manage">
                        <a  id='as' onclick="member_stop(this,'{{$v->id}}')" href="javascript:;"  title="停业整顿"
                            status="{{$v->status}}">
                            <i class="layui-icon" id="is"> &#xe601;</i>
                        </a>
                        @elseif($v->status=='2')
                            <span class="layui-btn layui-btn-normal layui-btn-mini layui-btn-disabled "> 停业整顿 </span>
                    </td>
                    <td class="td-manage">
                        <a id='as' onclick="member_stop(this,'{{$v->id}}')" href="javascript:;"  title="恢复营业 "
                           status="{{$v->status}}">
                            <i class="layui-icon">&#xe62f; </i>
                        </a>
                        @endif
                        <a title="删除店铺" onclick="member_del(this,'{{$v->id}}')" href="javascript:;"  status="{{$v->status}}">
                            <i class="layui-icon">&#xe640;</i>
                        </a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        <div class="page">
            <div>
                {{$details->links()}}
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
            if(status=='0'||status=='1'){
                str = '确认要停业该店铺吗?';
            }else{
                str = '确认要恢复该店铺营业吗?';
            }
            layer.confirm(str,function(index){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:'/admin/shops/changestatus',
                    data:{'id':id,'status':status},
                    dataType:'json',
                    type:'POST',
                    success:function(data){
                        if(data.status=='0'){
                            if(status==2){
                                $(obj).attr('status','0');
                                $(obj).find('i').html('&#xe601;');
                                $(obj).attr('title','停业整顿');
                                $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('正常营业');
                                layer.msg('恢复营业!',{icon: 6,time:1000});
                            }else{
                                $(obj).attr('status','2');
                                $(obj).find('i').html('&#xe62f;');
                                $(obj).attr('title','正常营业');
                                $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('停业整顿');
                                layer.msg('停业整顿!',{icon: 5,time:1000});
                            }
                        }else if(data.status=='1'){
                            layer.alert('修改失败');
                        }

                    },
                    timeout:3000,
                    async:true
                })
            });
        }
        /*用户-删除*/
        function member_del(obj,id){
            layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:'/admin/shops/delete/'+id,
                data:id,
                dataType:'json',
                type:'post',
                success:function(data){
                    // console.log(data);
                    if(data.status=='0'){
                            $(obj).parents("tr").remove();
                            layer.msg('已删除!',{icon:1,time:1000});
                            location.reload(true);

                    }else{
                        layer.msg('删除失败!',{icon:2,time:1000});
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