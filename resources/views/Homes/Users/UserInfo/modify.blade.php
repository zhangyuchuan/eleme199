<!DOCTYPE html>
<!-- saved from url=(0034)https://www.ele.me/profile/address -->
<html ng-app="eleme" perf-error="desktop/profile/" class="ng-scope">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style type="text/css">
            @charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide{display:none
            !important;}ng\:form{display:block;}.ng-animate-block-transitions{transition:0s
            all!important;-webkit-transition:0s all!important;}.ng-hide-add-active,.ng-hide-remove{display:block!important;}
        </style>
        <meta name="renderer" content="webkit">

        <title ng-bind="SEO.title" class="ng-binding">
            个人中心_地址管理 | 饿了么网上订餐
        </title>
        <meta name="format-detection" content="telephone=no, email=no">
        <meta name="application-name" content="饿了么网上订餐">
        <meta name="msapplication-tooltip" content="饿了么网上订餐">
        <meta name="msapplication-starturl" content="./">
        <meta name="msapplication-tileimage" content="=http://static11.elemecdn.com/apple-touch-icon.png?v=2">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="msapplication-tilecolor" content="#0088ff">
        <meta name="msapplication-task" content="name=切换地区;action-uri=http://ele.me/home;icon-uri=http://static11.elemecdn.com/apple-touch-icon.png?v=2">
        <meta name="msapplication-task" content="name=我要订餐;action-uri=http://ele.me?from=IE;icon-uri=http://static11.elemecdn.com/apple-touch-icon.png?v=2">
        <meta name="msapplication-task" content="name=订单中心;action-uri=http://ele.me/profile?from=IE;icon-uri=http://static11.elemecdn.com/apple-touch-icon.png?v=2">
        <meta name="msapplication-task" content="name=寻求帮助（HELP）;action-uri=http://ele.me/support?from=IE;icon-uri=http://static11.elemecdn.com/apple-touch-icon.png?v=2">
        <meta property="qc:admins" content="2263606250655">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="apple-touch-icon-precomposed" href="https://static2.ele.me/apple-touch-icon.png?v=2">
        <link rel="shortcut icon" href="https://static2.ele.me/eleme/desktop/media/img/favicon-16x16.png"
        type="image/png">
        <link rel="icon" href="https://static2.ele.me/eleme/desktop/media/img/favicon-16x16.png"
        type="image/png" sizes="16x16">
        <link rel="icon" href="https://static2.ele.me/eleme/desktop/media/img/favicon-32x32.png"
        type="image/png" sizes="32x32">
        <link rel="icon" href="https://static2.ele.me/eleme/desktop/media/img/favicon.png"
        type="image/png" sizes="96x96">
        <link href="/home/address/vendor.606e96.css" rel="stylesheet">
        <link href="/home/address/profile.2f9006.css" rel="stylesheet">
        <!--[if lte IE 8]>
            <script>
                window.location.href = 'https://h.ele.me/activities/landing';
            </script>
        <![endif]-->
        <script src="/home/address/api" data-ref="API_CONFIG">
        </script>
        <script src="/home/js/jquery.min.js"></script>
        <script src="/home/address/perf.js" type="text/javascript"
        crossorigin="anonymous">
        </script>
        <script src="/home/address/vendor.cfe9f1.js" type="text/javascript"
        crossorigin="anonymous">
        </script>
        <script src="/home/address/profile.2a1bfa.js" type="text/javascript"
        crossorigin="anonymous">
        </script>
        <!--<base href="/profile/">-->
        <base href=".">
        <meta name="mobile-agent" content="format=html5; url=http://m.ele.me/profile">
        <meta name="description" content="”饿了么”2008年创立于上海，是中国领先的本地生活平台。截至目前，饿了么在线外卖交易平台已覆盖全国2000个城市，加盟餐厅130万家，用户量达2.6亿">
        <meta name="keywords" content="饿了么，网上订餐，外卖，快餐外卖，外卖网">
    </head>

    <body cute-title="" ng-class="{hidesidebar: layoutState &amp;&amp; layoutState.hideSidebar, smallbody: layoutState.smallBody, whitebody: layoutState.whiteBody}"
    style="position: relative;">


        <div style="position: fixed; left: 0px; top: 0px; width: 100%; height: 100%; opacity: 0.5; background: rgb(0, 0, 0); z-index: 1008;">
        </div>
        <div class="addressdialog" style="z-index: 1009; left: 288px; top: 0px;">
            <div class="addressdialog-close">
            </div>
            <div class="addressdialog-header">
                修改地址
            </div>
            <form class="forms" action="{{url('/storemodify'.$address->id) }}" method='post'>
                {{csrf_field()}}
            <div class="addressdialog-content">
                <div class="addressform">
                    <div>
                        <div class="addressformfield">

                            <label>
                                姓名
                            </label><input type="text" id="receiver" name="rec" required="" lay-verify="username" value="{{$address->rec}}"
                                           autocomplete="off" class="layui-input">
                            {{--<input placeholder="请输入您的姓名">--}}
                            <div class="addressformfield-hint">
                                <span>

                                </span>
                            </div>
                        </div>
                        <div class="addressformfield sexfield">
                            <label>
                                性别
                            </label>
                            <div>
                                <input type="radio" name="sex" value="先生" title="男">

                                {{--<input id="sexfield-1-male" name="sex" type="radio" value="1">--}}
                                <label for="sexfield-1-male">
                                    先生
                                </label>
                                <input type="radio" name="sex" value="女士" title="女" checked>
                                {{--<input id="sexfield-1-female" type="radio" name="sex" value="2">--}}
                                <label for="sexfield-1-female">
                                    女士
                                </label>
                            </div>
                            <div class="addressformfield-hint">
                                <span>
                                </span>
                            </div>
                        </div>
                        <div class="addressformfield">
                            <label>
                                地址
                            </label>
                            <input placeholder="单元、门牌号" name="addr" value="{{$address->addr}}">
                            <div class="addressformfield-hint">
                                <span>
                                </span>
                            </div>

                        </div>
                        <div class="addressformfield phonefield">
                            <label>
                                手机号
                            </label>
                            <input type="text" id="phone" name="tel" required="" lay-verify="phone" value="{{$address->tel}}"
                                   autocomplete="off" class="layui-input">
                            {{--<input placeholder="请输入您的手机号">--}}
                            <div class="addressformfield-hint">
                                <span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="addressform-buttons">
                        <button  class="layui-btn" lay-filter="add" lay-submit="">
                            保存
                        </button>
                        <button>
                            取消
                        </button>
                    </div>
                </div>
            </div>
            </form>
        </div>

    </body>

    {{--<script>--}}

        {{--$('.forms').submit(function(data){--}}
            {{--$.ajax({--}}
                {{--headers: {--}}
                    {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
                {{--},--}}
                {{--url:'/store',--}}
                {{--//layui表单提交--}}
                {{--data:data.field,--}}
                {{--dataType:'json',--}}
                {{--type:'post',--}}
                {{--success:function(data){--}}
                    {{--// console.log(data);--}}
                   {{--// alert(data);--}}
                   {{--//  if(data.status==1){--}}
                        {{--alert(data.msg)--}}
                   {{--//  }else{--}}
                   {{--//      alert(data.msg)--}}
                {{--}--}}


            {{--});--}}
        {{--})--}}
    {{--</script>--}}


</html>