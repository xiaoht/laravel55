<?php
use App\Http\Models\Post;
use App\User;
$hot_posts = Post::getHotPosts();
$most_comments_users = User::getMostCommentsUser();
?>
@include('layouts.header')
@include('layouts.column')
<div class="layui-container">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md8">
            @yield('content')
        </div>
        <div class="layui-col-md4">

            <div class="fly-panel fly-rank fly-rank-reply" id="LAY_replyRank">
                <h3 class="fly-panel-title">回贴周榜</h3>
                <dl>
                    @foreach($most_comments_users as $user)
                        <dd>
                            <a href="{{ route('user.show' , ['user' => $user]) }}">
                                <img src="{{ $user->avatar }}"><cite>{{ $user->name }}</cite><i>{{ $user->comments_count }}次回答</i>
                            </a>
                        </dd>
                    @endforeach

                </dl>
            </div>

            <dl class="fly-panel fly-list-one">
                <dt class="fly-panel-title">本周热议</dt>
                @if(!$hot_posts->isEmpty())
                    @foreach($hot_posts as $post)
                        <dd>
                            <a href="{{ route('post.show' , [$post]) }}">{{ $post->title }}</a>
                            <span style="float: right"><i class="iconfont icon-pinglun1"></i> {{ $post->comments_count }}</span>
                        </dd>
                    @endforeach
                @else
                    <div class="fly-none">没有相关数据</div>
                @endif

            </dl>

            <div class="fly-panel fly-link">
                <h3 class="fly-panel-title">友情链接</h3>
                <dl class="fly-panel-main">
                    <dd><a href="http://www.xiaohtstyle.com" target="_blank">yii2</a><dd>
                </dl>
            </div>

        </div>
    </div>
</div>

@include('layouts.footer')