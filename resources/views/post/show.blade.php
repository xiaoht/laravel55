@extends('layouts.community')
@section('content')
    <div class="fly-panel detail-box">
        <h1>{{ $post->title }}</h1>
        <div class="fly-detail-info">
            <span class="layui-badge layui-bg-blue fly-detail-column">{{ $post_types[$post->post_type] }}</span>
            <span class="fly-list-nums">
            <a href="#comment"><i class="iconfont" title="回答">&#xe60c;</i> {{ count($post->comments) }}</a>
            <i class="iconfont" title="人气">&#xe60b;</i> {{ $post->views }}
          </span>
        </div>
        <div class="detail-about">
            <a class="fly-avatar" href="../user/home.html">
                <img src="{{ $post->user->avatar }}" alt="{{ $post->user->name }}">
            </a>
            <div class="fly-detail-user">
                <a href="../user/home.html" class="fly-link">
                    <cite>{{ $post->user->name }}</cite>

                </a>
                <span>{{ $post->created_at->toDateTimeString() }}</span>
            </div>
            <div class="detail-hits" id="LAY_jieAdmin" data-id="123">
                @can('update' , $post)
                    <span class="layui-btn layui-btn-xs jie-admin" type="edit"><a href="{{ route('post.edit' , ['post' => $post]) }}">编辑此贴</a></span>
                @endcan
                @can('update' , $post)
                    <span class="layui-btn layui-btn-xs jie-admin" type="edit" onclick="event.preventDefault();document.getElementById('delete-post').submit();">删除此帖</span>
                    {!! Form::open(['url' => route('post.destroy' , ['post' => $post]) , 'method' => 'DELETE ' , 'style' => 'display:none' , 'id' => 'delete-post']) !!}
                        {!! Form::hidden('_method' , 'DELETE') !!}
                    {!! Form::close() !!}
                @endcan
                <span class="jieda-zan" type="zan">
                    <i href="#" class="iconfont icon-zan"></i>
                    <em>点赞即可收藏！！！</em>
                </span>
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
                            <p>{{ $comment->content }}</p>
                        </div>
                    </li>
                @endforeach
            @else
                <li class="fly-none">消灭零回复</li>
            @endif
        </ul>

        <div class="layui-form layui-form-pane">
            {!! Form::open(['url' => route('post.comment' , ['post' => $post])]) !!}
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
    </div>
@endsection
