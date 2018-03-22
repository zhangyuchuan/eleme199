@extends('Admin.Common.Common')
@section('content')
    <body class="login-bg">
    <div class="login">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @if(is_object($errors))
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    @else
                        <li>{{ $errors }}</li>
                    @endif
                </ul>
            </div>
        @endif
        <div class="message">御膳房v 1.0后台管理</div>
        <div id="darkbannerwrap"></div>
        <form method="post" class="layui-form" action="{{url('admin/dologin')}}">
            {{csrf_field()}}
            <input name="username" placeholder="用户名" value="{{old('username')}}" type="text" lay-verify="required" class="layui-input" >
            <hr class="hr15">
            <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
            <hr class="hr15">
            <input name="yzm" lay-verify="required" placeholder="验证码"  type="text" class="layui-input" style="width:150px;float:left">
            {{--<img src="{{asset('admin/dologin')}}" onclick="this.src=this.src+'?'+Math.random()" alt="" style="width:100px;height:50px;float:right">--}}
            {{--<a href="javascript:" onclick="javascript:re_captcha()"><img id="123456" src="{{asset('code/captcha/1')}}" alt="" style="width:100px;height:50px;float:right"></a>--}}
            <a href="javascript:;" onclick='javascript:re_captcha()'><img src="{{ url('admin/code/captcha/1') }}" id="123456" alt="" style="width:150px;height:50px;float:right"></a>

            <hr class="hr15">
            <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
            <hr class="hr20" >
        </form>
    </div>
    <script>
        function re_captcha() {
            $url = "{{ URL('admin/code/captcha') }}";
            $url = $url + "/" + Math.random();
            document.getElementById('123456').src = $url;
        }

    </script>
    </body>
@endsection