<?php
use App\Http\Models\Post;
use Illuminate\Http\Request;
$post_types = Post::$post_types;
$post_type = \Request()->post_type;
?>
<div class="fly-panel fly-column">
    <div class="layui-container">
        <ul class="layui-clear">
            <li class="layui-hide-xs {{ is_null($post_type) ? 'layui-this' : '' }}"><a href="/">首页</a></li>
            @foreach($post_types as $k => $v)
                <li class="{{ $k === intval($post_type) && !is_null($post_type)  ? 'layui-this' : '' }}"><a href="{{ route('post_home' , ['post_type' => $k]) }}">{{ $v }}</a></li>
            @endforeach
            <li class="layui-hide-xs layui-hide-sm layui-show-md-inline-block"><span class="fly-mid"></span></li>

            <!-- 用户登入后显示 -->
            <li class="layui-hide-xs layui-hide-sm layui-show-md-inline-block"><a href="{{ route('user.index' , ['user' => Auth::user()]) }}">用户中心</a></li>
        </ul>

        <div class="fly-column-right layui-hide-xs">
            <span class="fly-search"><i class="layui-icon"></i></span>
            <a href="{{ route('post.create')}}" class="layui-btn">发表新帖</a>
        </div>
        <div class="layui-hide-sm layui-show-xs-block" style="margin-top: -10px; padding-bottom: 10px; text-align: center;">
            <a href="{{ route('post.create')}}" class="layui-btn">发表新帖</a>
        </div>
    </div>
</div>