<?php

namespace App\Http\Controllers\Admin\Shops;

use App\Model\ShopCategory;
use App\Model\ShopInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cates = ShopCategory::tree();

        return view('Admin.Shops.ShopsList',compact('cates','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //获得父分类
        $cateone = ShopCategory::where('pid','0')->get();
        return view('Admin.Shops.ShopsAdd',compact('cateone'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('_token');
        //执行存储
        $res = ShopCategory::create($input);
        //结果判断
        if ($res){
            return redirect('admin/shops')->with('msg','添加成功');
        }else{
            return back()->with('error','添加失败');
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //判断是否是一级分类,获取一级分类的id和所有子分类的id
        $arr = ShopCategory::getId($id);
        //获取所有符合条件的店铺数量
        $count = count(ShopInfo::whereIn('cateid',$arr)->get());
        //获得所有符合条件的店铺详情
        $details = ShopInfo::whereIn('cateid',$arr)->paginate(5);
        return view('Admin.Shops.ShopsDetails',compact('details','count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cateone = ShopCategory::find($id);

//        dd($cateone);
        return view('Admin.Shops.ShopsEdit',compact('cateone'));
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
        $input = $request->except('id');
        $ptn ='/\D{1,}/';
        if (preg_match($ptn,$input['order']) || $input['order']<0){
            $data = [
                'status' => 1,
                'msg' =>'只能是0或0以上数字'
            ];
            return $data;
        }
        $res = ShopCategory::where('id',$id)->update($input);
        if($res) {
            $data= [
                'status'=>0,
                'msg'=>'修改成功'
            ];
        }else{
            $data=[
                'status'=>1,
                'msg'=>'修改失败'
            ];
        }
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //判断一级分类是否含有子分类
        $cate = ShopCategory::where('pid',$id)->get();

        //查找该分类是否含有店铺
        $detail = ShopInfo::where('cateid',$id)->get();
        $res1 = count($detail,0);
        $res2 = count($cate,0);
        if ($res1 || $res2){
            $data = [
                'status'=>1,
                'msg' =>'该分类下不为空不能删除'
            ];
            return $data;
        }
        //执行删除
        $res = ShopCategory::destroy($id);
        //结果返回
        if($res) {
            $data= [
                'status'=>0,
                'msg'=>'删除成功'
            ];
        }else{
            $data=[
                'status'=>1,
                'msg'=>'删除失败'
            ];
        }
        return $data;

    }
    /**
     * 修改排序
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeorder(Request $request)
    {
       $input = $request->all();
       //判断输入的值
        $ptn ='/\D{1,}/';
        if (preg_match($ptn,$input['order']) || $input['order']<0){
            $data = [
                'status' => 1,
                'msg' =>'只能是0或0以上数字'
            ];
            return $data;
        }
       //更新排序值
        $res = ShopCategory::where('id',$input['id'])->update(['order'=>$input['order']]);
        if($res) {
            $data= [
                   'status'=>0,
                    'msg'=>'排序成功'
                ];
        }else{
            $data=[
                'status'=>1,
                'msg'=>'排序失败'
            ];
        }
        return $data;
    }
    /**
     * 修改店铺状态
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changestatus(Request $request)
    {
        //获得id
        $id = $request->input('id');
        //获得状态
        $status = $request->input('status');
        if($status==0||$status==1){
            $status = 2;
        }else if($status == 2){
            $status = 0;
        }
        //执行修改
        $res = ShopInfo::where('id',$id)->update(['status'=>$status]);
        //结果返回
        if($res) {
            $data= [
                'status'=>0,
                'msg'=>'更新成功'
            ];
        }else{
            $data=[
                'status'=>1,
                'msg'=>'更新失败'
            ];
        }
        return $data;
    }
    /**
     * 删除店铺
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteshop($id)
    {


       $res = ShopInfo::destroy($id);
//       return $res;
        if($res) {
            $data= [
                'status'=>0,
                'msg'=>'删除成功'
            ];
        }else{
            $data=[
                'status'=>1,
                'msg'=>'删除失败'
            ];
        }
        return $data;
    }
}
