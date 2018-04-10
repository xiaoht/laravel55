<?php

namespace App\Http\Models;

class Zan extends Model
{
    protected $fillable = ['user_id' , 'post_id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
