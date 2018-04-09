<?php

namespace App\Http\Models;

use App\User;

class Comment extends Model
{
    protected $fillable = ['content' , 'user_id' , 'post_id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
