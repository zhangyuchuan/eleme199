<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShopInfo extends Model
{
    public $table= 'shopinfo';
    public $primaryKey = 'id';
    public $timestamps = false;
    public $guarded = [];
}
