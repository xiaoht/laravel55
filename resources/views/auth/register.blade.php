@extends('layouts.app')

@section('content')
    <div class="fly-panel fly-panel-user" pad20>
        <div class="layui-tab layui-tab-brief" lay-filter="user">
            <ul class="layui-tab-title">
                <li><a href="{{route('login')}}">登入</a></li>
                <li><a class="layui-this">注册</a></li>
            </ul>
            <div class="layui-form layui-tab-content" id="LAY_ucm" style="padding: 20px 0;">
                <div class="layui-tab-item layui-show">
                    <div class="layui-form layui-form-pane">
                        {!! Form::open(['url' => route('register')]) !!}
                            <div class="layui-form-item">
                                {!! Form::label('name' , '用户名' , ['class' => 'layui-form-label']) !!}
                                <div class="layui-input-inline">
                                    {!! Form::text('name' , '' , ['id' => 'name' , 'lay-verify' => 'required' , 'autocomplete' => 'off' , 'class' => 'layui-input' , 'required' => 'required']) !!}
                                </div>
                            </div>
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
                                {!! Form::label('password_confirmation' , '确认密码' , ['class' => 'layui-form-label']) !!}
                                <div class="layui-input-inline">
                                    {!! Form::password('password_confirmation' , ['id' => 'password_confirmation' , 'lay-verify' => 'required' , 'autocomplete' => 'off' , 'class' => 'layui-input' , 'required' => 'required']) !!}
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <button class="layui-btn" lay-filter="*" lay-submit>立即注册</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection