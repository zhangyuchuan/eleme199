@extends('Homes.layout')
@section('title','饿了么-网上订餐_外卖_饿了么订餐官网')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- 地址栏 -->
    <div class="container clearfix scope">
        <div class="location" style="{visibility: geohash ? '' : 'hidden'}" role="navigation"
             location="" if="geohash">
        <span>
        当前位置:
        </span>
        <span class="location-current">
            <a class="inherit binding" href="/place/wx4eyv2e1qf" ubt-click="401" bind="place.name || place.address"
               href="/place/wx4eyv2e1qf">
                昌平区回龙观村东区(龙域中街南70米)
            </a>
        </span>
        <span class="location-change" class="{ 'location-hashistory': user.username && userPlaces && userPlaces.length > 0 }">
            <a href="/home" ubt-click="400" hardjump="" href="/home">
                [切换地址]
            </a>
            <ul class="dropbox location-dropbox" ubt-visit="398">
                <li class="arrow">
                </li>
                <li class="changelocation">
                    <a href="/home" hardjump="" href="/home">
                        修改收货地址
                        <span class="icon-location">
                        </span>
                    </a>
                </li>
            </ul>
        </span>
        </div>
        <div class="place-search" role="search" search-input="">
            <form action="/home/dosearch" method="post"  id="form" >
                {{csrf_field()}}
            <label for="globalsearch">
                搜索商家或美食
            </label>
            <input id="globalsearch" name="keywords" class="place-search-input ng-pristine ng-valid"
                   ng-model="searchText" autocomplete="" placeholder="搜索商家,美食...">
                <button class="place-search-btn icon-search" ubt-click="403" ng-attr-ubt-data-keyword=""
                        title="搜索商家或美食" ubt-data-keyword="">
                </button>
            </form>
            <script>
                $('#form').submit(function(){
                    var globalsearch = $('#globalsearch').val();
                    if(globalsearch==''){
                        return false;
                    }
                })
            </script>
        </div>
    </div>
    <style>
        .place-fetchtakeout{
            margin-bottom: -12px;
            width: 100%;
            height: 56px;
            position: relative;
            cursor: pointer;
            z-index: 2;
        }
        .place-fetchtakeout img{
            margin-bottom: 0px;
            width: 186px;
            height: 56px;
            position: absolute;
            right:155px;
            cursor: pointer;
            z-index: 2;
        }
        .excavator-filter-name {
            position: absolute;
            left: 10px;
            top: 13px;
            color: #999;
        }
    </style>
    <div class="place-fetchtakeout ng-isolate-scope" show-fetch-takeout-dialog="">
        <img src="/home/image/takeout.408a87.png" alt="谁去拿外卖">
    </div>

    <div class="container ng-scope" ng-show="!recentBoughtOnly">
        <div class="excavator container">
            <div class="excavator-filter ng-scope" >
            <span class="excavator-filter-name">
                商家分类:
            </span>
                {{--一级商家分类--}}
                <a class="excavator-filter-item ng-binding ng-scope active cateone" href="javascript:" id="0">全部商家</a>
                @foreach($cateone as $k=>$v)
                <a class="excavator-filter-item ng-binding ng-scope cateone"   ng-click="changeCategory(category)" ubt-click="380" href="javascript:" id="{{$v->id}}">{{$v->catename}}</a>
                @endforeach
                    {{--二级商家分类--}}
                    <div ng-show="subCategories" id="secondcate" class="excavator-filter-subbox" style="display:none">

                    </div>
            </div>
        </div>
        {{--商铺列表--}}
        <div class="place-rstbox clearfix " id="shoplistdiv">
        </div>
    </div>
    <script>
        $(function(){
            getShop(0)
            $('#0').css({'color':'#fff','backgroundColor':'#0089dc','borderRadius':'3px','height':'33px','lineHeight':'33px'});
        })
        $('.cateone').click(function(){
            $('.cateone').removeClass('active');
            $(this).addClass('active');
            $('.cateone').css({'color':'#666','backgroundColor':''});
            $(this).css({'color':'#fff','backgroundColor':'#0089dc','borderRadius':'3px','height':'33px','lineHeight':'33px'});

            var id = $(this).attr('id');
            //获取店铺
            getShop(id);
            if($(this).html()!='全部商家'){
                $('#secondcate').css('display','block')
                //获取子分类
                getCate(id);
            }else{
                $('#secondcate').css('display','none')
            }
        })

        // //获取子分类
        function getCate(id)
        {
             $.get('/home/getcate',{id:id},function(data){
                $('#secondcate').empty();
                $('#secondcate').append($(data));
            })
        }
        //获取商家列表
        function getShop(id,obj)
        {
            $.get('/home/getshop',{id:id},function(data){
                $('#shoplistdiv').empty();
                $('#shoplistdiv').append($(data));
            })
            $('.catesecond').removeClass('focus');
            $(obj).addClass('focus');
        }
    </script>
@endsection