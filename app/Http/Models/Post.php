<?php

namespace App\Http\Models;

use App\User;

class Post extends Model
{
    protected $fillable = ['title' , 'content' , 'user_id' , 'post_type'];

    public static $post_types = [
    	'提问',
    	'分享',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at' , 'desc');
    }
}
