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
                <th>店铺分类</th>
                <th>营业时间</th>
                <th>店铺状态</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($shops as $k=>$v)
                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->name}}</td>
                    <td style="width:220px">{{$v->address}}</td>
                    <td><img src="{{$v->logo}}" alt="" style="width:80px"></td>
                    <td>{{$v['cate']['catename']}}</td>
                    <td>{{$v->time}}</td>
                    <td class="td-status">
                        @if($v->status=='3')
                            <span class="layui-btn layui-btn-normal layui-btn-mini" id="spans"> 等待审核 </span>
                    </td>
                    <td class="td-manage">
                        <a  id='as' onclick="member_stop(this,'{{$v->id}}')" href="javascript:;"  title="审核通过"
                            status="{{$v->status}}">
                            <i class="layui-icon" id="is"> &#xe62f;</i>
                        </a>
                        @elseif($v->status=='2')
                            <span class="layui-btn layui-btn-normal layui-btn-mini "> 停业审核 </span>
                    </td>
                    <td class="td-manage">
                        <a id='as' onclick="member_stop(this,'{{$v->id}}')" href="javascript:;"  title="审核通过 "
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
                {{$shops->links()}}
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
            var str = '确认通过审核吗?';
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
                                layer.msg('操作成功!',{icon: 6,time:1000});
                                location.reload(true);
                        }else{
                            layer.msg('操作失败!',{icon: 6,time:1000});
                            location.reload(true);
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