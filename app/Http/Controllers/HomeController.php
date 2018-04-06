<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Post;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$posts = Post::orderBy('created_at' , 'desc')->paginate(2);
    	$post_types = Post::$post_types;
        return view('home' , compact('posts' , 'post_types'));
    }
}
