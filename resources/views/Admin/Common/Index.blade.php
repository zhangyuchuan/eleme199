@extends('Admin\Common\Common')
@section('title','欢迎来到后台')
@section('content')
    <!-- 顶部开始 -->
    <div class="container">
        <div class="logo"><a href="">御膳房 v1.0</a></div>
        <div class="left_open">
            <i title="展开左侧栏" class="iconfont">&#xe699;</i>
        </div>
        <ul class="layui-nav left fast-add" lay-filter="">
            <li class="layui-nav-item">
                <a href="javascript:;">+新增</a>
                <dl class="layui-nav-child"> <!-- 二级菜单 -->
                    <dd><a onclick="x_admin_show('资讯','http://www.baidu.com')"><i class="iconfont">&#xe6a2;</i>资讯</a></dd>
                    <dd><a onclick="x_admin_show('图片','http://www.baidu.com')"><i class="iconfont">&#xe6a8;</i>图片</a></dd>
                    <dd><a onclick="x_admin_show('用户','http://www.baidu.com')"><i class="iconfont">&#xe6b8;</i>用户</a></dd>
                </dl>
            </li>
        </ul>
        <ul class="layui-nav right" lay-filter="">
            <li class="layui-nav-item">
                <a href="javascript:;">admin</a>
                <dl class="layui-nav-child"> <!-- 二级菜单 -->
                    <dd><a onclick="x_admin_show('个人信息','http://www.baidu.com')">个人信息</a></dd>
                    <dd><a onclick="x_admin_show('切换帐号','http://www.baidu.com')">切换帐号</a></dd>
                    <dd><a href="./login.html">退出</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item to-index"><a href="/">前台首页</a></li>
        </ul>

    </div>
    <!-- 顶部结束 -->
    <!-- 中部开始 -->
    <!-- 左侧菜单开始 -->
    <div class="left-nav">
        <div id="side-nav">
            <ul id="nav">
                {{--管理员管理--}}
                <li>
                    <a href="javascript:;">
                        <i class="iconfont">&#xe726;</i>
                        <cite>超级管理员</cite>
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a _href="/admin/users/manger/list" target="_blank" >
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>管理员列表</cite>

                            </a>
                        </li >
                        <li>
                            <a _href="member-del.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>添加管理员</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="member-del.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>删除管理员</cite>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--普通用户管理--}}
                <li>
                    <a href="javascript:;">
                        <i class="iconfont">&#xe6b8;</i>
                        <cite>普通用户管理</cite>
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a _href="member-list.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>用户列表</cite>

                            </a>
                        </li >
                        <li>
                            <a _href="member-del.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>等级管理</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="member-del.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>用户审核</cite>
                            </a>
                        </li>

                    </ul>
                </li>
                {{--商家管理--}}
                <li>
                    <a href="javascript:;">
                        <i class="iconfont">&#xe6b8;</i>
                        <cite>商家管理</cite>
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a _href="member-list.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>用户列表</cite>

                            </a>
                        </li >
                        <li>
                            <a _href="member-del.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>等级管理</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="member-del.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>商家审核</cite>
                            </a>
                        </li>

                    </ul>
                </li>
                {{--商铺管理--}}
                <li>
                    <a href="javascript:;">
                        <i class="iconfont">&#xe726;</i>
                        <cite>商铺管理</cite>
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a _href="admin-list.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>商铺列表</cite>
                            </a>
                        </li >
                        <li>
                            <a _href="admin-role.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>开店申请</cite>
                            </a>
                        </li >
                    </ul>
                </li>
                {{--商品管理--}}
                <li>
                    <a href="javascript:;">
                        <i class="iconfont">&#xe726;</i>
                        <cite>商品管理</cite>
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a _href="admin-list.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>商品列表</cite>
                            </a>
                        </li >

                    </ul>
                </li>
                {{--订单管理--}}
                <li>
                    <a href="javascript:;">
                        <i class="iconfont">&#xe6ce;</i>
                        <cite>订单统计</cite>
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a _href="echarts1.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>拆线图</cite>
                            </a>
                        </li >
                        <li>
                            <a _href="echarts2.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>柱状图</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="echarts3.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>地图</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="echarts4.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>饼图</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="echarts5.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>雷达图</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="echarts6.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>k线图</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="echarts7.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>热力图</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="echarts8.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>仪表图</cite>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- <div class="x-slide_left"></div> -->
    <!-- 左侧菜单结束 -->
    <!-- 右侧主体开始 -->

    <div class="page-content">
        <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
            <ul class="layui-tab-title">
                <li>@yield('title')</li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <div class="x-body">
                        <blockquote class="layui-elem-quote">欢迎使用御膳房后台！v1.0</blockquote>
                        <fieldset class="layui-elem-field">
                            <legend>信息统计</legend>
                            <div class="layui-field-box">
                                <table class="layui-table" lay-even>
                                    <thead>
                                    <tr>
                                        <th>统计</th>
                                        <th>资讯库</th>
                                        <th>图片库</th>
                                        <th>产品库</th>
                                        <th>用户</th>
                                        <th>管理员</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>总数</td>
                                        <td>92</td>
                                        <td>9</td>
                                        <td>0</td>
                                        <td>8</td>
                                        <td>20</td>
                                    </tr>
                                    <tr>
                                        <td>今日</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>昨日</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>本周</td>
                                        <td>2</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>本月</td>
                                        <td>2</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </fieldset>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    <div class="page-content-bg"></div>
    <!-- 右侧主体结束 -->
    <!-- 中部结束 -->
    <!-- 底部开始 -->
    <div class="footer">
        <div class="copyright">Copyright ©2018 御膳房 v1.0 All Rights Reserved</div>
    </div>
    <!-- 底部结束 -->

@endsection