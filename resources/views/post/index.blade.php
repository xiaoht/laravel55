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
                    <a href="{{ route('user.show' , ['user' => $post->user]) }}" class="fly-avatar">
                        <img src="{{ $post->user->avatar }}" alt="{{ $post->user->name}}">
                    </a>
                    <h2>
                        <a class="layui-badge">{{ $post_types[$post->post_type] }}</a>
                        <a href="{{ route('post.show' , [$post]) }}">{!! str_limit($post->title, 70 , '...') !!}</a>
                    </h2>
                    <div class="fly-list-info">
                        <a href="{{ route('user.show' , ['user' => $post->user]) }}" link>
                            <cite>{{ $post->user->name}}</cite>
                        </a>
                        <span>{{ $post->created_at->diffForHumans() }}</span>
                        <span class="fly-list-nums">
                            <i class="iconfont icon-pinglun1" title="回答"></i> {{ $post->comments_count }}
                            <i class="iconfont" title="人气">&#xe60b;</i> {{ $post->views_count }}
                            <i class="iconfont icon-zan"></i> {{ $post->zans_count }}
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
