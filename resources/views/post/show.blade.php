@extends('layouts.community')
@section('content')
    <div class="fly-panel detail-box">
        <h1>{!! $post->title !!}</h1>
        <div class="fly-detail-info">
            <!-- <span class="layui-badge">审核中</span> -->
            <span class="layui-badge layui-bg-green fly-detail-column">动态</span>

            <div class="fly-admin-box" data-id="123">
                <span class="layui-btn layui-btn-xs jie-admin" type="del">删除</span>

            </div>
            <span class="fly-list-nums">
            <a href="#comment"><i class="iconfont" title="回答">&#xe60c;</i> 66</a>
            <i class="iconfont" title="人气">&#xe60b;</i> 99999
          </span>
        </div>
        <div class="detail-about">
            <a class="fly-avatar" href="../user/home.html">
                <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" alt="贤心">
            </a>
            <div class="fly-detail-user">
                <a href="../user/home.html" class="fly-link">
                    <cite>贤心</cite>

                </a>
                <span>{{ $post->created_at->diffForHumans() }}</span>
            </div>
            <div class="detail-hits" id="LAY_jieAdmin" data-id="123">
                @if (Auth::check() && Auth::user()->can('update', $post))
                    <span class="layui-btn layui-btn-xs jie-admin" type="edit"><a href="{{ route('post.edit' , ['post' => $post]) }}">编辑此贴</a></span>
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
            <li data-id="111" class="jieda-daan">
                <a name="item-1111111111"></a>
                <div class="detail-about detail-about-reply">
                    <a class="fly-avatar" href="">
                        <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" alt=" ">
                    </a>
                    <div class="fly-detail-user">
                        <a href="" class="fly-link">
                            <cite>贤心</cite>
                            <i class="iconfont icon-renzheng" title="认证信息：XXX"></i>
                            <i class="layui-badge fly-badge-vip">VIP3</i>
                        </a>

                        <span>(楼主)</span>
                        <!--
                        <span style="color:#5FB878">(管理员)</span>
                        <span style="color:#FF9E3F">（社区之光）</span>
                        <span style="color:#999">（该号已被封）</span>
                        -->
                    </div>

                    <div class="detail-hits">
                        <span>2017-11-30</span>
                    </div>

                    <i class="iconfont icon-caina" title="最佳答案"></i>
                </div>
                <div class="detail-body jieda-body photos">
                    <p>香菇那个蓝瘦，这是一条被采纳的回帖</p>
                </div>
                <div class="jieda-reply">
              <span class="jieda-zan zanok" type="zan">
                <i class="iconfont icon-zan"></i>
                <em>66</em>
              </span>
                    <span type="reply">
                <i class="iconfont icon-svgmoban53"></i>
                回复
              </span>
                    <div class="jieda-admin">
                        <span type="edit">编辑</span>
                        <span type="del">删除</span>
                        <!-- <span class="jieda-accept" type="accept">采纳</span> -->
                    </div>
                </div>
            </li>

            <li data-id="111">
                <a name="item-1111111111"></a>
                <div class="detail-about detail-about-reply">
                    <a class="fly-avatar" href="">
                        <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" alt=" ">
                    </a>
                    <div class="fly-detail-user">
                        <a href="" class="fly-link">
                            <cite>贤心</cite>
                        </a>
                    </div>
                    <div class="detail-hits">
                        <span>2017-11-30</span>
                    </div>
                </div>
                <div class="detail-body jieda-body photos">
                    <p>蓝瘦那个香菇，这是一条没被采纳的回帖</p>
                </div>
                <div class="jieda-reply">
              <span class="jieda-zan" type="zan">
                <i class="iconfont icon-zan"></i>
                <em>0</em>
              </span>
                    <span type="reply">
                <i class="iconfont icon-svgmoban53"></i>
                回复
              </span>
                    <div class="jieda-admin">
                        <span type="edit">编辑</span>
                        <span type="del">删除</span>
                        <span class="jieda-accept" type="accept">采纳</span>
                    </div>
                </div>
            </li>

            <!-- 无数据时 -->
            <!-- <li class="fly-none">消灭零回复</li> -->
        </ul>

        <div class="layui-form layui-form-pane">
            {!! Form::open(['url' => '/']) !!}
                <div class="layui-form-item layui-form-text">
                    <a name="comment"></a>
                    <div class="layui-input-block">
                        <textarea id="L_content" name="content" required lay-verify="required" placeholder="请输入内容"  class="layui-textarea fly-editor" style="height: 150px;"></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <input type="hidden" name="jid" value="123">
                    <button class="layui-btn" lay-filter="*" lay-submit>提交回复</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
