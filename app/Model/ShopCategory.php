<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShopCategory extends Model
{
    public $table ='shopcategory';
    public $primaryKey = 'id';
    public $timestamps = false;
    public $guarded = [];

    //自定义分类函数
    public static function tree()
    {
        //获取分类所需要的数据
        $cates = self::orderBy('order','asc')->get();
        return self::getTree($cates,0,'pid');
    }

    //格式化 缩进和排序
    public static function getTree($category,$pid=0,$cate_pid='pid')
    {
        $arr = [];
        foreach($category as $v)
        {
            if ($v->pid == $pid)
            {
                $arr[] = $v;
                foreach($category as $vv)
                {
                    if ($vv->pid == $v->id)
                    {
                        $vv ->catename = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|---'.$vv->catename;
                        $arr[]= $vv;
                    }
                }
            }

        }
        return $arr;
    }

    //获取所有分类和子分类的id集合
    public static function getId($id)
    {

        $catefirst = ShopCategory::find($id);
        $arr = [];
        //将id存进数组
        $arr[] = $id;
        //将子分类的id存进数组
        if ($catefirst->pid==0){
            $cates=ShopCategory::where('pid',$id)->get();
            foreach($cates as $k=>$v){
                $arr[] = $v->id;
            }
        }
        return $arr;
    }

}
