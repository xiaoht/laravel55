@extends('layouts.app')
@section('content')
    <div class="layui-container fly-marginTop fly-user-main">
    <ul class="layui-nav layui-nav-tree layui-inline" lay-filter="user">
        <li class="layui-nav-item">
            <a href="{{ route('user.show' , [$user]) }}">
                <i class="layui-icon">&#xe609;</i>
                我的主页
            </a>
        </li>
        <li class="layui-nav-item layui-this">
            <a href="{{ route('user.index' , [$user]) }}">
                <i class="layui-icon">&#xe612;</i>
                用户中心
            </a>
        </li>
    </ul>

    <div class="site-tree-mobile layui-hide">
        <i class="layui-icon">&#xe602;</i>
    </div>
    <div class="site-mobile-shade"></div>

    <div class="site-tree-mobile layui-hide">
        <i class="layui-icon">&#xe602;</i>
    </div>
    <div class="site-mobile-shade"></div>


    <div class="fly-panel fly-panel-user" pad20>
        <div class="layui-tab layui-tab-brief" lay-filter="user">
            <ul class="layui-tab-title" id="LAY_mine">
                <li data-type="mine-jie" lay-id="index" class="layui-this">我发的帖（<span>{{ count($user->posts) }}</span>）</li>
                <li data-type="collection" data-url="/collection/find/" lay-id="collection">我收藏的帖（<span>{{ count($user->zans) }}</span>）</li>
            </ul>
            <div class="layui-tab-content" style="padding: 20px 0;">
                <div class="layui-tab-item layui-show">
                    <ul class="mine-view jie-row">
                        @foreach($user->posts as $post)
                            <li>
                                <a class="jie-title" href="{{ route('post.show' , [$post]) }}" target="_blank">{!! str_limit($post->title, 70 , '...') !!}</a>
                                <i>{{ $post->created_at->toDateTimeString() }}</i>
                                <a class="mine-edit" href="{{ route('post.edit' , [$post]) }}">编辑</a>
                                <em>{{ $post->views }}阅/{{ count($post->comments) }}答/{{ count($post->zans) }}赞</em>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="layui-tab-item">
                    @foreach($user->zans as $zan)
                        <ul class="mine-view jie-row">
                            <li>
                                <a class="jie-title" href="{{ route('post.show' , ['post' => $zan->post]) }}">{!! str_limit($zan->post->title, 70 , '...') !!}</a>
                                <i>收藏于{{ $zan->created_at->diffForHumans() }}</i>
                            </li>
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection