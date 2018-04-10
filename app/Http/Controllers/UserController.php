<?php

namespace App\Http\Controllers;

use App\Http\Models\Post;
use Auth;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        $user->load(['posts' , 'posts.comments' , 'posts.zans' , 'comments' , 'comments.post']);
        $post_types = Post::$post_types;
        return view('user.show'  , compact('user' , 'post_types'));
    }

    public function index(User $user)
    {
        if(Auth::id() === $user->id)
        {
            $user->load(['posts' , 'posts.comments' , 'posts.zans' , 'zans' , 'zans.post']);
            $post_types = Post::$post_types;
            return view('user.index'  , compact('user' , 'post_types'));
        }

    }
}
