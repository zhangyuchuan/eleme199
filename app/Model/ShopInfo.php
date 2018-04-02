<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShopInfo extends Model
{
    public $table= 'shopinfo';
    public $primaryKey = 'id';
    public $timestamps = false;
    public $guarded = [];

    public function goods()
    {

        return $this->hasMany('App\Model\Goods', 'sid', 'id');
    }
    public function cate()
    {
        return $this->belongsTo('App\Model\ShopCategory','cateid','id');
    }
}
