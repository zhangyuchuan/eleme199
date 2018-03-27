<?php

namespace App\Http\Controllers\Admin\Biz;

use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Crypt;

class MerchantController extends Controller
{
    //商家列表
    public function list(Request $request)
    {
        //获取数据
        //$users  = User::get();
        //return view('Admin.Biz.ShopsList',['users'=>$users]);
        // 4. 多条件并分页
        $users = User::orderBy('id', 'asc')
            ->where(function ($query) use ($request) {
                //检测关键字
                $username = $request->input('keywords1');
                $email = $request->input('keywords2');
                //如果用户名不为空
                if (!empty($username)) {
                    $query->where('username', 'like', '%' . $username . '%');
                }
                //如果邮箱不为空
                if (!empty($email)) {
                    $query->where('email', 'like', '%' . $email . '%');
                }
            })
            ->paginate($request->input('num', 6));
        return view('Admin.Biz.ShopsList', ['users' => $users, 'request' => $request]);
    }

    //删除
    public function destroy($id)
    {
        $users = User::find($id);

        $res = $users->delete();
        if ($res) {
//            json格式的接口信息  {'status':是否成功，'msg'：提示信息}
            $arr = [
                'status' => 0,
                'msg' => '删除成功'
            ];
        } else {
            $arr = [
                'status' => 1,
                'msg' => '删除失败'
            ];
        }

        return $arr;
    }

    //禁用  启用用户
    public function changestatus(Request $request)
    {

//        return 11111;
        //用户id
        $uid = $request->input('id');
        //用户的状态
        $status = ($request->input('status') == 1) ? 0 : 1;

        //修改状态
        $users = User::find($uid);
        $res = $users->update(['status' => $status]);

        if ($res) {
//            json格式的接口信息  {'status':是否成功，'msg'：提示信息}
            $arr = [
                'status' => 0,
                'msg' => '修改成功'
            ];
        } else {
            $arr = [
                'status' => 1,
                'msg' => '修改失败'
            ];
        }

        return $arr;


    }


    //删除所有被选中的用户
    public function delall(Request $request)
    {
        //获取请求参数中，要删除的用户的id
        $ids = $request->input('ids');
//       return $ids;
//        删除ids里存储的用户的id对应的用户
        $res = User::destroy($ids);

        if ($res) {
            $data = [
                'status' => 0,
                'msg' => '删除成功'
            ];
        } else {
            $data = [
                'status' => 1,
                'msg' => '删除失败'
            ];
        }


        return $data;

    }


    //等级
    public function grade()
    {
        return view('Admin.Biz.ShopGrade');
    }

    //商家审核
    public function audit()
    {
        return view('Admin.Biz.ShopAudit');
    }
}



