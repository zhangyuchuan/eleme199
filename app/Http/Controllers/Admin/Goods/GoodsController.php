<?php

namespace App\Http\Controllers\Admin\Goods;

use App\Model\Goods;
use App\Model\GoodsCate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//         多条件并分页
        $goods = Goods::orderBy('id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $gname = $request->input('gname');
                $sid = $request->input('sid');
                //如果商品名不为空
                if(!empty($gname)) {
                    $query->where('gname','like','%'.$gname.'%');
                }
                //如果商铺编号不为空
                if(!empty($sid)) {
                    $query->where('sid',$sid);
                }
            })
            ->paginate($request->input('num', 5));
        return view('Admin.Goods.GoodsList',['goods'=>$goods, 'request'=> $request]);
    }

    public function add()
    {

    }
    public function Del()
    {
        return view('Admin.Goods.GoodsDel');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //商品添加页面
        return view('Admin.Goods.GoodsAdd');
    }

    public function upload(Request $request)
    {
        $file = $request -> file('fileupload');
        if ($file->isValid()){
            //            获取原文件的文件类型
            $ext = $file->getClientOriginalExtension();    //文件拓展名
//            生成新文件名
            $newfile = md5(date('YmdHis').rand(1000,9999).uniqid()).'.'.$ext;
//            1. 将文件上传到本地服务器
            //将文件从临时目录移动到制定目录
           $path = $file->move(public_path().'/uploads',$newfile);


               return $newfile;

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接收表单数据
        $input = $request ->except('_token','fileupload');
        $res = Goods::create($input);

        if($res){
           $arr = [
               'status'=>0,
               'msg'=>'添加成功'
           ];
        }else{
            $arr = [
                'status'=>1,
                'msg'=>'添加失败'
            ];
        }
        return $arr;
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
        $goods = Goods::find($id);

        $sid = $goods->sid;

        $goodscate = GoodsCate::where('sid',$sid)->get();
//        return $goodscate;

        return view('Admin/Goods/GoodsEdit',['goods'=>$goods,'id'=>$id,'goodscate'=>$goodscate]);
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
//        return $request->all();
        $input = $request ->except('_token','fileupload');
        $goods = Goods::find($id);
        $res = $goods->update($input);

        if($res){
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
