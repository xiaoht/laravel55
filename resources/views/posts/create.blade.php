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
            <form action="" method="post">
              <div class="layui-row layui-col-space15 layui-form-item">
                <div class="layui-col-md4">
                  <label class="layui-form-label">专栏</label>
                  <div class="layui-input-block">
                    <select lay-verify="required" name="class" lay-filter="column"> 
                      <option></option> 
                      <option value="0">提问</option> 
                      <option value="99">分享</option> 
                      <option value="100">讨论</option> 
                      <option value="101">建议</option> 
                      <option value="168">公告</option> 
                      <option value="169">动态</option> 
                    </select>
                  </div>
                </div>
                <div class="layui-col-md8">
                  <label for="L_title" class="layui-form-label">标题</label>
                  <div class="layui-input-block">
                    <input type="text" id="L_title" name="title" required lay-verify="required" autocomplete="off" class="layui-input">
                  </div>
                </div>
              </div>
              <div class="layui-form-item layui-form-text">
                <div class="layui-input-block">
                  <textarea id="L_content" name="content" required lay-verify="required" placeholder="详细描述" class="layui-textarea fly-editor" style="height: 260px;"></textarea>
                </div>
              </div>
              <div class="layui-form-item">
                <button class="layui-btn" lay-filter="*" lay-submit>立即发布</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection