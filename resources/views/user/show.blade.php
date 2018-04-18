@extends('layouts.app')
@section('content')
    <div class="fly-home fly-panel">
        <img src="{{ $user->avatar }}" alt="{{ $user->name }}">
        <h1>
            {{ $user->name }}
        </h1>

        <p class="fly-home-info">
            <span>{{ $user->created_at->toDateTimeString() }} 加入</span>
        </p>

        <p class="fly-home-sign">{{ $user->intro }}</p>

        <div class="fly-sns" data-user="">
            <a href="javascript:;" class="layui-btn layui-btn-primary fly-imActive" data-type="addFriend">加为好友</a>
        </div>

    </div>

    <div class="layui-container">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md6 fly-home-jie">
                <div class="fly-panel">
                    <h3 class="fly-panel-title">{{ $user->name }} 最近的交流</h3>
                    <ul class="jie-row">
                        @if($user->posts()->exists())
                            @foreach($user->posts->take(20) as $post)
                                <li>
                                    <span class="layui-badge layui-bg-green fly-detail-column">{{ $post_types[$post->post_type] }}</span>
                                    <a href="{{ route('post.show' , [$post]) }}" target="_blank" class="jie-title">{!! str_limit($post->title, 40 , '...') !!}</a>
                                    <i>{{ $post->created_at->diffForHumans() }}</i>
                                    <em class="layui-hide-xs">{{ $post->comments_count }}答/{{ $post->views_count }}阅/{{ $post->zans_count }}赞</em>
                                </li>
                            @endforeach
                        @else
                            <div class="fly-none" style="min-height: 50px; padding:30px 0; height:auto;"><i style="font-size:14px;">没有发表任何交流</i></div>
                        @endif
                    </ul>
                </div>
            </div>

            <div class="layui-col-md6 fly-home-da">
                <div class="fly-panel">
                    <h3 class="fly-panel-title">{{ $user->name }} 最近的评论</h3>
                    <ul class="home-jieda">
                        @if($user->comments()->exists())
                            @foreach($user->comments->take(5) as $comment)
                                <li>
                            <p>
                                <span>{{ $comment->created_at->diffForHumans() }}</span>
                                在<a href="{{ route('post.show' , ['post' => $comment->post]) }}" target="_blank">{!! str_limit($comment->post->title, 40 , '...') !!}</a>中回答：
                            </p>
                            <div class="home-dacontent">
                                {!! $comment->content !!}
                            </div>
                        </li>
                            @endforeach
                        @else
                            <div class="fly-none" style="min-height: 50px; padding:30px 0; height:auto;"><span>没有任何评论</span></div>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
