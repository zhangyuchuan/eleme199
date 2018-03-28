<?php

namespace App\Http\Controllers\Admin\Config;

use App\Model\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $conf = Config::get();
        foreach($conf as $v){
            switch ($v->field_type){
                //如果当前记录的类型是文本框
//      aaaa   =====>    <input type="text" name="title"  class="layui-input" value="aaaa">
                case 'input':
                    $v->conf_content = '<input type="text" name="conf_content[]"  class="layui-input" value="'.$v->conf_content.'">';
                    break;
                //如果当前记录的类型是文本域
//       bbbb   =====>     <textarea name=""  class="layui-textarea">bbbbb</textarea>
                case 'textarea':
                    $v->conf_content ='<textarea name="conf_content[]"  class="layui-textarea">'.$v->conf_content.'</textarea>';
                    break;

                //如果当前记录的类型是单选按钮
                case 'radio':
//      1|开启,0|关闭====>
//      <input type="radio" name="aaa" value="1" title="开启" checked="">
//      <input type="radio" name="aaa" value="0" title="关闭">
                    $str = '';

                    $arr = explode(',',$v->field_value);
//                  $arr = [
//                      0=>'1|开启',
//                      1=>'0|关闭',
//                  ];
                    foreach ($arr as $n){

                        $a = explode('|',$n);//[0=>1,1=>开启]
                        $checked =    ($a[0] == $v->conf_content)?'checked':'';

                        $str.= '<input type="radio" name="conf_content[]" value="'.$a[0].'" title="'.$a[1].'" '.$checked.'>'.$a[1];
                    }

                    $v->conf_content = $str;


                    break;


                case 'img':
                    $v->conf_content = "<input type='hidden' name='conf_content[]' value='".$v->conf_content."'><img src='". $v->conf_content."' />";

            }
        }

        return view('admin.config.list',compact('conf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('Admin.Config.add');
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
        $res = Config::create($input);

        if($res){
            //添加成功
            echo '添加成功';
            return redirect('admin/config');

        }else{
            return back()->with('msg','添加失败');
            echo '添加失败';
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($conf_id)
    {
        //
        $conf = Config::find($conf_id);
        $res = $conf->delete();
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

    //批量修改
    public function changeContent(Request $request)
    {
        $input = $request->all();
//        dd($input);
//        开启事务
        DB::beginTransaction();

        try{
            foreach($input['conf_id'] as $k=>$v){
                //$v就是要更新的网站配置项的id
                Config::find($v)->update(['conf_content'=>$input['conf_content'][$k]]);
            }
            DB::commit();
            return redirect('admin/config');

        }catch(Exception $e){
            DB::rollBack();
            return redirect()->back()
                ->withErrors(['error' => $e->getMessage()]);
        }



        return redirect('admin/config');
    }
}
