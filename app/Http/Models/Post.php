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
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class , 'post_id' , 'id')->orderBy('created_at' , 'desc');
    }

    public function zan($user_id)
    {
        return $this->hasOne(Zan::class)->where('user_id' , $user_id);
    }

    public function zans()
    {
        return $this->hasMany(Zan::class , 'post_id' , 'id');
    }
}
