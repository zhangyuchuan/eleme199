<?php

namespace App\Http\Controllers\Home\Users;

use App\Model\Collect;
use App\Model\Orders;
use App\Model\ShopInfo;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class UserController extends Controller
{
    //个人中心
    public function center()
    {


        $all=User::with('Orders')->where('id',6)->first();
//        dd($all);
        $sids = [];
        foreach($all->Orders as $v){
            $sids[] = $v->sid;
        }
//        dd($sids);
        $shops = ShopInfo::whereIn('id',$sids)->get();
//        dd($shops);
        return view('Homes.Users.center',compact('all','shops'));

    }

    //用户收藏
    public function collect()
    {
        //假设一个用户
        $uid = 24;

        //获取用户收藏的店铺id
        $collect = Collect::where('uid',$uid)->get();
        $arr = [];
        if(!empty($collect)) {
            foreach ($collect as $v) {
                $arr[] = $v->sid;
            }
        }
//        dd($arr);
            //获取店铺信息
            $shop_data = ShopInfo::whereIn('id',$arr)->get();

//        dd($shop_data);

        return view('Homes.Users.collect',compact('shop_data'));
    }
    //删除收藏
    public function delete($id)
    {
//        dd($id);
        $cid = Collect::where('sid',$id)->first();
//        dd($cid);
        $res= $cid->delete();
//        dd($res);
        if($res) {
            return redirect('/collect');

        }else{
            return back();
        }
    }

}
