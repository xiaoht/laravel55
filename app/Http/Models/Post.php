<?php

namespace App\Http\Models;

use App\User;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use Searchable;
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

    public static function getHotPosts()
    {
        $posts = Post::orderBy('comments_count' ,  'desc')->with(['user'])->take(10)->get();
        return $posts;
    }
}
