@extends('Admin.Common.Common')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
    <div class="x-body">
        <div class="layui-row">
        </div>
            <span class="x-right" style="line-height:40px">共有数据：{{count($shops)}} 条</span>
        <table class="layui-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>店铺名称</th>
                <th>地址</th>
                <th>营业时间</th>
                <th>销量</th>
                <th>收入</th>
                <th>订单数量</th>
                <th>积分</th>
                <th>logo</th>
                <th>店铺公告</th>
                <th>状态</th>
                <th>操作</th></tr>
            </thead>
            <tbody>
            @foreach($shops as $v)
                <tr>
                    <td>{{$v->id}}</td>
                    <td style="width:120px">{{$v->name}}</td>
                    <td style="width:120px">{{$v->address}}</td>
                    <td style="width:125px">
                        {{$v->time}}
                    </td>
                    <td>{{$v->sailcount}}</td>
                    <td>{{$v->income}}</td>
                    <td>{{$v->order}}</td>
                    <td>{{$v->score}}</td>
                    <td><img src="/uploads/201803250257203124.jpg" alt="" style="width:80px"></td>
                    <td style="width:180px">
                        {!! $v->content !!}
                    </td>
                    <td class="td-status">
                        @if($v->status=='0')
                            <span class="layui-btn layui-btn-normal layui-btn-mini" id="spans"> 正常营业 </span>
                    </td>
                    <td class="td-manage">
                        <a  id='as' onclick="member_stop(this,'{{$v->id}}')" href="javascript:;"  title="休息 "
                            status="{{$v->status}}">
                            <i class="layui-icon" id="is"> &#xe601;</i>
                        </a>
                        @elseif($v->status=='1')
                            <span class="layui-btn layui-btn-normal layui-btn-mini layui-btn-disabled "> 休息 </span>
                    </td>
                    <td class="td-manage">
                        <a id='as' onclick="member_stop(this,'{{$v->id}}')" href="javascript:;"  title="营业 "
                           status="{{$v->status}}">
                            <i class="layui-icon">&#xe62f; </i>
                        </a>
                        @elseif($v->status=='2')
                            <span class="layui-btn layui-btn-normal layui-btn-mini layui-btn-disabled "> 停业整顿 </span>
                    </td>
                    <td class="td-manage">
                        <a id='as' onclick="member_stop(this,'{{$v->id}}')" href="javascript:;"  title="申请营业 "
                           status="{{$v->status}}">
                            <i class="layui-icon">&#xe62f; </i>
                        </a>
                        @elseif($v->status=='3')
                            <span class="layui-btn layui-btn-normal layui-btn-mini layui-btn-disabled "> 等待审核 </span>
                            <td>

                        @endif
                        <a title="编辑"  onclick="x_admin_show('编辑','/admin/seller/shops/{{$v->id}}/edit',900,600)" href="javascript:;">
                            <i class="layui-icon">&#xe642;</i>
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
                {!! $shops->links() !!}
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

        //更改店铺公告
        $('textarea[name="shopcontent"]').change(function(){

            var id = $(this).attr('id');
            var content = $(this).val();
            $.get('/admin/seller/shops/changecontent',{id:id,content:content},function(data){
               if (data.status=='0'){
                   layer.alert(data.msg, {icon: 1, time: 1000});
               }else if(data.status=='1'){
                    layer.alert(data.msg, {icon: 2, time: 1000});
                }
            })
        })

        /*用户-停用*/
        function member_stop(obj,id){

            var status = $(obj).attr('status');
            var str = '';
            if(status=='0'){
                str = '好好休息~~';
            }else if(status=='1'){
                str = '工作愉快!!';
            }else{
                str = '申请恢复营业?';
            }
            layer.confirm(str,function(index){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:'/admin/seller/shops/changestatus',
                    data:{'id':id,'status':status},
                    dataType:'json',
                    type:'POST',
                    success:function(data){
                        if(data.status=='2'){
                            layer.alert(data.msg, {icon: 1, time: 2000});
                            location.reload(true);
                            $(obj).parents("tr").find(".td-status").find('span').html('等待审核');
                        }
                        if(status=='1'){
                            if(data.status=='0'){
                                $(obj).attr('status','0');
                                $(obj).find('i').html('&#xe601;');
                                $(obj).attr('title','休息');
                                $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('正常营业');
                                layer.msg('工作愉快!!',{icon: 6,time:1000});
                            }else if(data.status=='1'){
                                layui.alert('修改失败');
                            }
                        }else if(status=='0'){
                            if(data.status=='0') {
                                $(obj).attr('status', '1');
                                $(obj).find('i').html('&#xe62f;');
                                $(obj).attr('title', '营业');
                                $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('休息');
                                layer.msg('好好休息!', {icon: 6, time: 1000});
                            }else if(data.status=='1'){
                                layui.alert('修改失败');
                            }
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