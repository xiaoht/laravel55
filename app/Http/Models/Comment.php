<?php

namespace App\Http\Models;

use App\User;

class Comment extends Model
{
    protected $fillable = ['content' , 'user_id' , 'post_id'];

    public function post()
    {
        return $this->belongsTo(Post::class , 'post_id' , 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
}
