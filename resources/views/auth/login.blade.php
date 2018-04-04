@extends('layouts.app')

@section('content')
    <div class="fly-panel fly-panel-user" pad20>
        <div class="layui-tab layui-tab-brief" lay-filter="user">
            <ul class="layui-tab-title">
                <li class="layui-this">登入</li>
                <li><a href="{{route('register')}}">注册</a></li>
            </ul>
            <div class="layui-form layui-tab-content" id="LAY_ucm" style="padding: 20px 0;">
                <div class="layui-tab-item layui-show">
                    <div class="layui-form layui-form-pane">
                        {!! Form::open(['url' => route('login')]) !!}
                            <div class="layui-form-item">
                                {!! Form::label('email' , '邮箱' , ['class' => 'layui-form-label']) !!}
                                <div class="layui-input-inline">
                                    {!! Form::text('email' , '' , ['id' => 'L_email' , 'lay-verify' => 'required' , 'autocomplete' => 'off' , 'class' => 'layui-input' , 'required' => 'required']) !!}
                                </div>
                            </div>
                            <div class="layui-form-item">
                                {!! Form::label('password' , '密码' , ['class' => 'layui-form-label']) !!}
                                <div class="layui-input-inline">
                                    {!! Form::password('password' , ['id' => 'L_pass' , 'lay-verify' => 'required' , 'autocomplete' => 'off' , 'class' => 'layui-input' , 'required' => 'required']) !!}
                                </div>
                            </div>
                            <div class="layui-form-item">
                                {!! Form::label('password' , '记住我' , ['class' => 'layui-form-label']) !!}
                                <div class="layui-input-inline">
                                    <input type="checkbox" name="remember" lay-skin="switch" lay-text="ON|OFF" {{ old('remember') ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <button class="layui-btn" lay-filter="*" lay-submit>立即登录</button>
                                <span style="padding-left:20px;">
                                    <a href="{{ route('password.request') }}">忘记密码？</a>
                                </span>
                            </div>
                            <div class="layui-form-item fly-form-app">
                                <span>或者使用社交账号登入</span>
                                <a href="" onclick="layer.msg('正在通过QQ登入', {icon:16, shade: 0.1, time:0})" class="iconfont icon-qq" title="QQ登入"></a>
                                <a href="" onclick="layer.msg('正在通过微博登入', {icon:16, shade: 0.1, time:0})" class="iconfont icon-weibo" title="微博登入"></a>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
