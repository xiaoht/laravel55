@extends('layouts.community')
@section('content')
    <div class="fly-panel" style="margin-bottom: 0;">

        <div class="fly-panel-title fly-filter">
            <a href="" class="layui-this">综合</a>
            <span class="fly-filter-right layui-hide-xs">
            <a href="" class="layui-this">按最新</a>
          </span>
        </div>

        <ul class="fly-list">
            @foreach($posts as $post)
                <li>
                    <a href="user/home.html" class="fly-avatar">
                        <img src="{{ $post->user->avatar }}" alt="贤心">
                    </a>
                    <h2>
                        <a class="layui-badge">{{ $post_types[$post->post_type] }}</a>
                        <a href="{{ route('post.show' , ['post'=>$post]) }}">{!! str_limit($post->title, 70 , '...') !!}</a>
                    </h2>
                    <div class="fly-list-info">
                        <a href="user/home.html" link>
                            <cite>{{ $post->user->name }}</cite>
                        </a>
                        <span>{{ $post->created_at->diffForHumans() }}</span>
                        <span class="fly-list-nums">
                            <i class="iconfont icon-pinglun1" title="回答"></i> {{ $post->comments_count }}
                            <i class="iconfont" title="人气">&#xe60b;</i> {{ $post->views }}
                        </span>
                    </div>
                </li>
            @endforeach
        </ul>
        <div style="text-align: center">
            {{ $posts->links() }}
        </div>

    </div>
@endsection
