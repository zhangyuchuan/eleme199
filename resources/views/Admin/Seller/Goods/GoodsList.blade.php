@extends('Admin.Common.Common')
@section('content')
    <div class="x-body">
        <div class="layui-row">
            <form class="layui-form layui-col-md12 x-so" action="/admin/seller/goods" method="get">
                <div class="layui-input-inline">
                    <select name="num">
                        <option value="5"
                                @if($request['num'] == 5)  selected  @endif
                        >5
                        </option>
                        <option value="10"
                                @if($request['num'] == 10)  selected  @endif
                        >10
                        </option>
                    </select>
                </div>
                <input type="text" name="gname" value="{{$request->gname}}" placeholder="请输入商品名" autocomplete="off" class="layui-input">
                <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
            </form>
        </div>
        <xblock>
            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
            <button class="layui-btn" onclick="x_admin_show('添加商品','{{ url('admin/seller/goods/create')}}',600,500)"><i class="layui-icon"></i>添加</button>
            <span class="x-right" style="line-height:40px">共有数据：{{ count($good) }}条</span>
        </xblock>
        <table class="layui-table">
            <thead>
            <tr>
                <th>
                    <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
                </th>
                <th>商品</th>
                <th>图片</th>
                <th>单价</th>
                <th>商品类别</th>
                <th>商家</th>
                <th>商品描述</th>
                <th>销量</th>
                <th>评分</th>
                <th>状态</th>
                <th>操作</th></tr>
            </thead>
            <tbody>
            @foreach($goods as $v)
            <tr>
                <td>
                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='{{ $v->id }}'><i class="layui-icon">&#xe605;</i></div>
                </td>
                <td>{{ $v->gname }}</td>
                <td><img src="{{ '/uploads/'.$v->gpic }}" alt=""></td>
                <td>{{ $v->price }}</td>
                <td>{{ $goodscate[$v->gcid] }}</td>
                <td>{{ $shops[$v->sid] }}</td>
                <td>{{ $v->gdesc }}</td>
                <td>{{ $v->salecnt }}</td>
                <td>{{ $v->gscore }}</td>
                <td class="td-status">
                    {{--<span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span>--}}
                    <select name="status" id="gsta" onchange="changesta(this,'{{ $v->id }}')">
                        <option value="1" {{ ($v->status == 1)? 'selected':'' }}>新品</option>
                        <option value="2" {{ ($v->status == 2)? 'selected':'' }}>上架</option>
                        <option value="3" {{ ($v->status == 3)? 'selected':'' }}>已售完</option>
                        <option value="4" {{ ($v->status == 4)? 'selected':'' }}>优惠</option>
                    </select>
                </td>

                <td class="td-manage">
                    <a title="编辑"  onclick="x_admin_show('编辑','/admin/seller/goods/{{$v->id}}/edit',600,400)" href="javascript:;">
                        <i class="layui-icon">&#xe642;</i>
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
            {!! $goods->appends($request->all())->render() !!}
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


          function changesta(obj,id){
              var stav = $(obj).val();
              $.post('/admin/seller/goods/chasta',{'_token':"{{csrf_token()}}",'status':stav,'id':id},function(data){
                  if (data.status == '0') {
                      layer.msg('修改成功!', {icon: 1, time: 1000});
                  }else{
                      layer.msg('修改失败!', {icon: 1, time: 1000});
                  }
              })

          }

        /*商品-删除*/
        function member_del(obj,id){

            layer.confirm('确认要删除吗？', function (index) {
                $.ajax({
                    url: '/admin/seller/goods/' + id,
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
            var data = tableCheck.getData();

            layer.confirm('确认要删除吗？',function(index){
                // layer.confirm('确认要删除吗？',function(index){
                $.post('/admin/seller/goods/delall',{'_token':"{{csrf_token()}}",'ids':data},function(data){
                    if (data.status == '0') {
                        layer.msg('删除成功', {icon: 1});
                        $(".layui-form-checked").not('.header').parents('tr').remove();
                        location.reload(true);
                    }else{
                        layer.msg('删除失败!', {icon: 1, time: 1000});
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