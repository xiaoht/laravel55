@extends('layouts.community')
@section('content')
    <div class="fly-panel detail-box">
        <h1>{{ $post->title }}</h1>
        <div class="fly-detail-info">
            <span class="layui-badge layui-bg-blue fly-detail-column">{{ $post_types[$post->post_type] }}</span>
            <span class="fly-list-nums">
            <a href="#comment"><i class="iconfont" title="回答">&#xe60c;</i> {{ count($post->comments) }}</a>
            <i class="iconfont" title="人气">&#xe60b;</i> {{ $post->views }}
            <span class="jieda-zan" type="zan">
                <i class="iconfont icon-zan"></i>
                {{ count($post->zans) }}
            </span>
          </span>
        </div>
        <div class="detail-about">
            <a class="fly-avatar" href="{{ route('user.show' , ['user' => $post->user]) }}">
                <img src="{{ $post->user->avatar }}" alt="{{ $post->user->name }}">
            </a>
            <div class="fly-detail-user">
                <a href="{{ route('post.show' , ['user' => $post->user]) }}" class="fly-link">
                    <cite>{{ $post->user->name }}</cite>

                </a>
                <span>{{ $post->created_at->toDateTimeString() }}</span>
            </div>
            <div class="detail-hits" id="LAY_jieAdmin" data-id="123">
                @can('update' , $post)
                    <span class="layui-btn layui-btn-xs jie-admin" type="edit"><a href="{{ route('post.edit' , [$post]) }}">编辑此贴</a></span>
                @endcan
                @can('update' , $post)
                    <span class="layui-btn layui-btn-xs jie-admin" type="edit" onclick="event.preventDefault();document.getElementById('delete-post').submit();">删除此帖</span>
                    {!! Form::open(['url' => route('post.destroy' , [$post]) , 'method' => 'DELETE ' , 'style' => 'display:none' , 'id' => 'delete-post']) !!}
                        {!! Form::hidden('_method' , 'DELETE') !!}
                    {!! Form::close() !!}
                @endcan
                @if($post->zan(\Auth::id())->exists())
                    <span class="jieda-zan zanok" type="zan">
                        <a href="{{ route('post.unzan' , [$post])}}" class="iconfont icon-zan"></a>
                        <em>取消点赞即可取消收藏！！！</em>
                    </span>
                @else
                    <span class="jieda-zan" type="zan">
                        <a href="{{ route('post.zan' , [$post]) }}" class="iconfont icon-zan"></a>
                        <em>点赞即可收藏！！！</em>
                    </span>
                @endif

            </div>
        </div>
        <div class="detail-body photos">
            {!! $post->content !!}
        </div>
    </div>

    <div class="fly-panel detail-box" id="flyReply">
        <fieldset class="layui-elem-field layui-field-title" style="text-align: center;">
            <legend>回帖</legend>
        </fieldset>

        <ul class="jieda" id="jieda">
            @if($post->comments()->exists())
                @foreach($post->comments as $comment)
                    <li class="jieda-daan">
                        <div class="detail-about detail-about-reply">
                            <a class="fly-avatar" href="">
                                <img src="{{ $comment->user->avatar }}" alt=" ">
                            </a>
                            <div class="fly-detail-user">
                                <a href="" class="fly-link">
                                    <cite>{{ $comment->user->name }}</cite>
                                </a>
                            </div>
                            <div class="detail-hits">
                                <span>{{ $comment->created_at->toDateTimeString() }}</span>
                            </div>
                        </div>
                        <div class="detail-body jieda-body photos">
                            <p>{!! $comment->content !!}</p>
                        </div>
                    </li>
                @endforeach
            @else
                <li class="fly-none">消灭零回复</li>
            @endif
        </ul>

        @guest
            <button href="{{ route('login') }}" class="layui-btn layui-btn-fluid" style="width: 100%">快去登陆评论吧！！！</button>
        @else
            <div class="layui-form layui-form-pane">
                {!! Form::open(['url' => route('post.comment' , [$post])]) !!}
                <div class="layui-form-item layui-form-text">
                    <div class="layui-input-block">
                        {!! Form::textarea ('content' , old('title') , ['id' => 'L_content' , 'class' => 'layui-textarea fly-editor']) !!}
                    </div>
                </div>
                <div class="layui-form-item">
                    {!! Form::submit('提交回复' , ['class' => 'layui-btn']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        @endguest
    </div>
@endsection
