<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;
use Laravel\Scout\Searchable;

class Model extends BaseModel
{
    protected $guarded = ['file'];  //不可以注入的数据字段
    //protected $fillable = ['title' , 'content']; //可以注入的数据字段

    public function returnMsg($code = 200 , $data = [] , $msg = 'success')
    {
        $res = array(
            'code' => $code,
            'data' => $data,
            'msg'  => $msg
        );
        return $res;
    }
}
