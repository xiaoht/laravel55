<?php

namespace App\Http\Models;

class Post extends Model
{
    protected $fillable = ['title' , 'content' , 'user_id' , 'post_type'];

    public static $post_types = [
    	'提问',
    	'分享',
    ];
}
