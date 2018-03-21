<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    public $table = 'webadmin';

    //2. 模型默认的主键
    public $primaryKey ='id';

//    3. 是否自动维护created_at updated_at这两个字段
    public $timestamps = false;
}
