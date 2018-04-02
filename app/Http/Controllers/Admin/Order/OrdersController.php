<?php

namespace App\Http\Controllers\Admin\Order;

use App\Model\Order;
use App\Model\OrderInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index(Request $request)
//    {}
    public function list(Request $request)
    {
        $orders = Order::orderBy('oid','asc')
            ->where(function($query) use($request){
                $sid = $request->input('sid');
                //如果不为空
                if(!empty($sid)) {
                    $query->where('sid','like','%'.$sid.'%');
                }
            })
            ->get();

        $order = Order::orderBy('oid','asc')
            ->where(function($query) use($request){

            })
            ->paginate($request->input('num', 3));
        return view('Admin.Order.OrderList',compact('order','orders','request'));

    }


//    public function del()
//    {
//        return view('Admin.Order.OrderDel');
//    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = order::find($id);

        $res = $order->delete();
        if($res){
//            json格式的接口信息  {'status':是否成功，'msg'：提示信息}
            $arr = [
                'status'=>0,
                'msg'=>'删除成功'
            ];
        }else{
            $arr = [
                'status'=>1,
                'msg'=>'删除失败'
            ];
        }

        return $arr;
    }

    public function changestatus(Request $request)
    {


        //用户id
        $oid = $request->input('oid');
        //用户的状态
        $status =  ($request->input('status') == 1)? 0:1;

        //修改状态
        $orders = Order::find($oid);
        $orders->status=$status;
        $res = $orders->save();

        if($res){
//            json格式的接口信息  {'status':是否成功，'msg'：提示信息}
            $arr = [
                'status'=>0,
                'msg'=>'修改成功'
            ];
        }else{
            $arr = [
                'status'=>1,
                'msg'=>'修改失败'
            ];
        }

        return $arr;



    }

    public function info(Request $request)
    {

        // 搜索条件下获取
        $orderinfo =orderinfo::orderBy('id','asc')->where(function($query) use($request){
            //检测关键字
            $name = $request->input('name');
            $sex = $request->input('sex');
            //如果用户名不为空
            if(!empty($name)) {
                $query->where('name','like','%'.$name.'%');
            }
            //如果性别不为空
            if(!empty($sex)) {
                $query->where('sex',$sex);
            }
        })
            ->paginate($request->input('num', 3));


//
        return view('Admin.Order.OrdersInfo',['ordersinfo'=>$orderinfo,'request'=> $request]);





    }
}
