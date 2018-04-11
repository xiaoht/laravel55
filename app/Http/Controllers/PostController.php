<?php

namespace App\Http\Controllers;

use App\Http\Models\Comment;
use App\Http\Models\Post;
use App\Http\Models\Zan;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\PostRequest;
use Auth;
use DB;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth' , ['only' => ['create' , 'store' , 'edit' , 'update' , 'destory' , 'imageUpload' , 'zan' , 'unzan']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($post_type)
    {
        $posts = Post::where('post_type' , $post_type)->orderBy('created_at' ,  'desc')->with(['user'])->withCount(['comments','zans'])->paginate(10);
        $post_types = Post::$post_types;
        return view('post.index' , compact('posts' , 'post_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post_types = Post::$post_types;
        return view('post.create' , compact('post_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $data = [
            'user_id' => Auth::user()->id,
        ];
        $post = Post::create(array_merge($request->all() , $data));
        return redirect(route('post.show' , ['post' => $post]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->load(['user' , 'comments' , 'comments.user' , 'zans']);
        $post_types = Post::$post_types;
        DB::table('posts')->where('id' , $post->id)->increment('views');
        return view('post.show' , compact('post' , 'post_types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('update' , $post);
        $post_types = Post::$post_types;
        return view('post.edit' , compact('post' , 'post_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request , Post $post)
    {
        $this->authorize('update' , $post);
        $post->update($request->all());
        return redirect(route('post.show' , ['post' => $post]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete' , $post);
        $post->delete();
        $post->comments()->delete();
        $post->zans()->delete();
        return redirect(route('home'));
    }

    public function imageUpload(Request $request)
    {
        $path = $request->file('file')->storePublicly(md5(Auth::id() . time()));
        $data['src'] = asset('storage/'. $path);
        return $this->returnMsg(0,$data,'');
    }

    public function comment(CommentRequest $request , Post $post)
    {
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->content = request('content');
        $post->comments()->save($comment);
        return back();
    }

    public function zan(Post $post)
    {
        $params = [
            'user_id' => Auth::id(),
            'post_id' => $post->id
        ];
        Zan::firstOrCreate($params);
        return back();
    }

    public function unzan(Post $post)
    {
        $post->zan(Auth::id())->delete();
        return back();
    }
}
