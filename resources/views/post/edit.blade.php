@extends('layouts.community')
@section('content')
    <div class="fly-panel" pad20 style="padding-top: 5px;">
        <!--<div class="fly-none">没有权限</div>-->
        <div class="layui-form layui-form-pane">
            <div class="layui-tab layui-tab-brief" lay-filter="user">
                <ul class="layui-tab-title">
                    <li class="layui-this">发表新帖<!-- 编辑帖子 --></li>
                </ul>
                <div class="layui-form layui-tab-content" id="LAY_ucm" style="padding: 20px 0;">
                    <div class="layui-tab-item layui-show">
                        {!! Form::open(['url' => route('post.update' , [$post]) , 'method' => 'put']) !!}
                        <div class="layui-row layui-col-space15 layui-form-item">
                            <div class="layui-col-md4">
                                {!! Form::label('post_type', '专栏' , ['class' => 'layui-form-label']) !!}
                                <div class="layui-input-block">
                                    {!! Form::select('post_type', $post_types, $post->post_type , ['lay-verify' => 'required' , 'lay-filter' => 'column']) !!}
                                </div>
                            </div>
                            <div class="layui-col-md8">
                                {!! Form::label('title', '标题' , ['class' => 'layui-form-label']) !!}
                                <div class="layui-input-block">
                                    {!! Form::text('title' , $post->title , ['id' => 'L_title' , 'required' => 'required' , 'lay-verify' => 'required' , 'autocomplete' => 'off' , 'class' => 'layui-input']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item layui-form-text">
                            <div class="layui-input-block">
                                {!! Form::textarea ('content' , $post->content , ['id' => 'L_content' , 'class' => 'layui-textarea fly-editor']) !!}
                            </div>
                        </div>
                        <div class="layui-form-item">
                            {!! Form::submit('立即编辑' , ['class' => 'layui-btn']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection