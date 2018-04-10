@extends('layouts.app')

@section('content')
    <div class="layui-container fly-marginTop">
        <div class="fly-panel fly-panel-user" pad20>
        <div class="layui-tab layui-tab-brief" lay-filter="user">
            <ul class="layui-tab-title">
                <li class="layui-this">重置密码</li>
            </ul>
            <div class="layui-form layui-tab-content" id="LAY_ucm" style="padding: 20px 0;">
                <div class="layui-tab-item layui-show">
                    <div class="layui-form layui-form-pane">
                        {!! Form::open(['url' => route('password.email')]) !!}
                        <div class="layui-form-item">
                            {!! Form::label('email' , '邮箱' , ['class' => 'layui-form-label']) !!}
                            <div class="layui-input-inline">
                                {!! Form::text('email' , old('email') , ['id' => 'L_email' , 'lay-verify' => 'required' , 'autocomplete' => 'off' , 'class' => 'layui-input' , 'required' => 'required']) !!}
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <button class="layui-btn" lay-filter="*" lay-submit>发送重置邮件</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
