@extends('Admin.Common.Common')

@section('content')
    <div class="x-body">
        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
            <legend>
                @if(session('error'))
                    session('error')
                @else
                    网站配置详情信息
                @endif
            </legend>
        </fieldset>
      <table class="layui-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>网站配置标题</th>
            <th>网站配置名称</th>
            <th>网站配置值</th>

            <th>操作</th></tr>
        </thead>
        <tbody>
        <form action="{{ url('admin/config/changecontent') }}" method="post">
        @foreach($conf as $v)
          <tr>
            <td>{{ $v->conf_id }}</td>
            <td>{{ $v->conf_title }}</td>
            <td>{{ $v->conf_name }}</td>
            <td style="width:250px;">
              <input type="hidden" name="conf_id[]" value="{{ $v->conf_id }}">
              {!! $v->conf_content !!}
            </td>

            <td class="td-manage">
              <a title="删除" onclick="member_del(this,{{ $v->conf_id }})" href="javascript:;">
                <i class="layui-icon">&#xe640;</i>
              </a>
            </td>
          </tr>

        @endforeach
        <tr>
          <td></td>
          <td colspan="4">
{{ csrf_field() }}
              <div class="layui-input-block">
                <button class="layui-btn" lay-submit="" lay-filter="demo1">确认修改</button>
              </div>

          </td>
        </tr>
        </form>
        </tbody>
      </table>
      <div class="page">
{{--        {{ $arts->links() }}--}}
{{--        {!! $users->appends($request->all())->render() !!}--}}
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


      // 修改用户排序
      // @param obj 当前文本框元素
      // @cateid 当前分类的
      function changeOrder(obj,cateid){
          // 获取当前文本框的值
          var cate_order = $(obj).val();

          $.post('/admin/cate/changeorder',{"_token":"{{ csrf_token() }}","conf_id":cateid,"cate_order":cate_order},function (data) {
              console.log(data);

              if(data.status == 0){
                  layer.msg(data.msg,{icon:6,time:1000});
                  //刷新页面
                  window.location.reload(true);
              }else{
                  layer.msg(data.msg,{icon:5,time:1000});
              }
          })
      }

       /*用户-停用*/
      function member_stop(obj,id){
          //获取要改变状态的用户的id

          //获取当前改变用户的状态
          var status = $(obj).attr('status');


          layer.confirm('确认要停用吗？',function(index){

              if($(obj).attr('title')=='启用'){


                  $.ajax({
                      type: "POST",
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      url: "/admin/user/changestatus",
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



          layer.confirm('确认要删除吗？',function(index){

              // $.post('请求的路径','携带的参数'，执行成功后的返回结果)
              $.post("{{ url('admin/user/') }}/"+id,{'_token':"{{csrf_token()}}",'_method':'delete'},function(data){
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

        // var data = tableCheck.getData();

          //声明一个空数组，存放所有被选中的复选框的data-id属性值
          var ids = [];
        //获取所有的被选中的复选框
          $('.layui-form-checked').not('.header').each(function(i,v){
              ids.push($(v).attr('data-id'));
          });
          // console.log(ids);


          $.get('/admin/user/delall',{"ids":ids},function(data){
              //后台如果删除成功，在前台上也把相关记录删除掉
              if(data.status == 0){
                  layer.msg('删除成功', {icon: 1});
                  $(".layui-form-checked").not('.header').parents('tr').remove();
              }else{
                  layer.msg('删除失败', {icon: 2});
              }
          })
  
        // layer.confirm('确认要删除吗？'+data,function(index){
        //     //捉到所有被选中的，发异步进行删除
        //     layer.msg('删除成功', {icon: 1});
        //     $(".layui-form-checked").not('.header').parents('tr').remove();
        // });
      }
    </script>
    <script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
      })();</script>
@endsection