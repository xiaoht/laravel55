<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>海涛社区</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="海涛社区">
    <meta name="description" content="海涛社区">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/fly/res/layui/css/layui.css">
    <link rel="stylesheet" href="/fly/res/css/global.css">
</head>
<body>

<div class="fly-header layui-bg-black">
    <div class="layui-container">
        <a class="fly-logo" href="/">
            <img src="/fly/res/images/logo.png" alt="layui">
        </a>
        <ul class="layui-nav fly-nav layui-hide-xs">
            <li class="layui-nav-item layui-this">
                <a href="/"><i class="iconfont icon-jiaoliu"></i>社区</a>
            </li>
            <li class="layui-nav-item layui-this">
                <a href="/admin" target="_blank"><i class="iconfont icon-iconmingxinganli"></i>后台</a>
            </li>
        </ul>

        <ul class="layui-nav fly-nav-user">
            @guest
                <!-- 未登入的状态 -->
                <li class="layui-nav-item">
                    <a class="iconfont icon-touxiang layui-hide-xs" href="user/login.html"></a>
                </li>
                <li class="layui-nav-item">
                    <a href="{{ route('login') }}">登入</a>
                </li>
                <li class="layui-nav-item">
                    <a href="{{ route('register') }}">注册</a>
                </li>
                <li class="layui-nav-item layui-hide-xs">
                    <a href="/app/qq/" onclick="layer.msg('正在通过QQ登入', {icon:16, shade: 0.1, time:0})" title="QQ登入" class="iconfont icon-qq"></a>
                </li>
                <li class="layui-nav-item layui-hide-xs">
                    <a href="/app/weibo/" onclick="layer.msg('正在通过微博登入', {icon:16, shade: 0.1, time:0})" title="微博登入" class="iconfont icon-weibo"></a>
                </li>
            @else
                <!-- 登入后的状态 -->
                <li class="layui-nav-item">
                    <a class="fly-nav-avatar" href="javascript:;">
                    <cite class="layui-hide-xs">{{Auth::user()->name}}</cite>
                    @if(Auth::user()->is_active)
                        <i class="iconfont icon-renzheng layui-hide-xs" title=""></i>
                        <i class="layui-badge fly-badge-vip layui-hide-xs">vip</i>
                    @endif
                    <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg">
                    </a>
                    <dl class="layui-nav-child">
                    <dd><a href="../user/set.html"><i class="layui-icon">&#xe620;</i>基本设置</a></dd>
                    <dd><a href="{{ route('user.index' , ['user' => Auth::user()]) }}"><i class="layui-icon" style="top: 4px;">&#xe857;</i>用户中心</a></dd>
                    <dd><a href="{{ route('user.show' , ['user' => Auth::user()]) }}"><i class="layui-icon" style="margin-left: 2px; font-size: 22px;">&#xe68e;</i>我的主页</a></dd>
                    <hr style="margin: 5px 0;">
                    <dd><a href="{{url('/logout')}}" style="text-align: center;" onclick="event.preventDefault();document.getElementById('logout-form').submit();">退出</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </dd>
                    </dl>
                </li>
            @endguest
        </ul>
    </div>
</div>